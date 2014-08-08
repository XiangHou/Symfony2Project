<?php
/**
 * Created by PhpStorm.
 * User: core
 * Date: 7/8/14
 * Time: 4:33 PM
 */

namespace Site\MobileBundle\Controller\Modules\Users;


use Site\MobileBundle\Controller\Modules\Bean;

class UserBean extends Bean
{
    protected  $id;
    protected  $username;
    protected  $password;
    protected  $birthday;
    protected  $height;
    protected  $weight;
    protected  $sex;
    protected  $type;
    protected  $created_time;
    protected  $location;

    function __construct($data = array())
    {
        $this->doctrineName = 'Users';
        $this->doctrineBundle = 'SiteStoreBundle';
        $this->doctrineNamespace = 'Site\\StoreBundle\\Entity\\';
        $this->usingClassName = __CLASS__;
        parent::__construct($data);
        $this->id = md5(time());
        $this->birthday = isset($this->birthday)? \DateTime::createFromFormat('Y-m-d', $this->birthday):null;
        $this->password = isset($this->password)? $this->password:null;
        $this->created_time = \DateTime::createFromFormat('Y-m-d H:i:s',date('Y-m-d H:i:s',time()));
    }

    public function build()
    {
        parent::build();
    }

    public function setAttributes()
    {
        $this->doctrine->setId($this->id);
        $this->doctrine->setUsername($this->username);
        $this->doctrine->setBirthday($this->birthday);
        $this->doctrine->setHeight($this->height);
        $this->doctrine->setWeight($this->weight);
        $this->doctrine->setSex($this->sex);
        $this->doctrine->setType($this->type);
        $this->doctrine->setPassword($this->password);
        $this->doctrine->setCreatedTime($this->created_time);
        $this->doctrine->setLocation($this->location);
    }
}
