<?php
/**
 * Created by PhpStorm.
 * User: core
 * Date: 7/8/14
 * Time: 5:49 PM
 */

namespace Site\MobileBundle\Controller\Modules;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Site\MobileBundle\Controller\Modules\Users;

class MainController extends Controller
{
    protected $connManger;
    public $result;
    public $data;
    public $beanData;
    protected $bean;
    protected $beanNamespace;
    protected $moduleName;
    protected $emModule = array('user');
    protected $dmModule = array();
    protected $encoder;

    function __construct()
    {

    }


    public function response()
    {
        return new Response($this->result);
    }

    public function build()
    {
        $beanName = $this->beanNamespace.$this->moduleName.'Bean';
        $this->bean = new $beanName($this->beanData);
        $this->bean->build();
        $this->setConnManger();
        if (isset($this->data['security'])) {
            $this->encodeValues();
        }
        if (isset($this->data['DBUpdate'])) {
            $this->bean->setAttributes();
        }
    }

    protected function encodeValues()
    {
        $this->setEncoder();
    }

    protected function setEncoder()
    {
        $this->encoder = $this->get('security.encoder_factory')->getEncoder($this->bean->doctrine);
    }

    protected function setConnManger()
    {
        if (in_array(strtolower($this->moduleName), $this->emModule)) {
            $this->connManger = $this->getDoctrine()->getManager();
        }
        else if (in_array(strtolower($this->moduleName), $this->dmModule)) {
            $this->connManger = $this->get('doctrine_mongodb');
        }
        else {
            exit;
        }
    }

    protected function getOneRecordByColumnName($colName, $value)
    {
        $record = null;
        $repository = $this->connManger->getRepository($this->bean->repository);
        $record = $repository->findBy(
            array($colName => $value)
        );
        if (isset($record[0])) {
            return $record[0];
        }
        else {
            return null;
        }
    }

    protected function insertOneRecord()
    {
        $this->connManger->persist($this->bean->doctrine);
        $this->connManger->flush();
    }

    protected function getRecordsByColumnName($colName, $value, $limit = 0)
    {

    }

    protected function getRecordsList($limit = 0)
    {

    }
} 