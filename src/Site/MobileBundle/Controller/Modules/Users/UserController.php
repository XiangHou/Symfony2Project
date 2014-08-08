<?php
/**
 * Created by PhpStorm.
 * User: core
 * Date: 7/8/14
 * Time: 6:13 PM
 */

namespace Site\MobileBundle\Controller\Modules\Users;


use Site\MobileBundle\Controller\Modules\MainController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends MainController
{
    function __construct()
    {
        parent::__construct();
        $this->moduleName = 'User';
        $this->beanNamespace = 'Site\\MobileBundle\\Controller\\Modules\\Users\\';
        $this->data = $_POST;
        $this->beanData = json_decode($_POST['data'],true);
        $this->data['security'] = true;
    }

    protected function encodeValues()
    {
        parent::encodeValues();
        $encodePassword = $this->encoder->encodePassword(
            $this->bean->getAttribute('password'),
            $this->bean->doctrine->getSalt()
        );
        $this->bean->setAttribute('password', $encodePassword);
    }

    /**
     * @Route("/createUser")
     */
    public function createUserAction()
    {
        $this->data['processType'] = 'search';
        $this->build();
        if ($this->getOneRecordByColumnName('username', $this->beanData['username'])) {
            $this->result = 'record exist';
        }
        else {
            $this->data['DBUpdate'] = true;
            $this->bean = null;
            $this->build();
            $this->insertOneRecord();
            $this->result = 'inserted';
        }
        return $this->response();
    }
}