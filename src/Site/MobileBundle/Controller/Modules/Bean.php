<?php
/**
 * Created by PhpStorm.
 * User: core
 * Date: 7/8/14
 * Time: 4:34 PM
 */

namespace Site\MobileBundle\Controller\Modules;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\StoreBundle\Entity;
use Site\Tools;

abstract class Bean
{
    public $doctrineName;
    public $doctrine;
    public $connManger;
    public $dataBaseType;
    public $repository;
    public $doctrineBundle;
    public $doctrineNamespace;
    public $usingClassName;

    function __construct($data = array()) {
        $this->repository = $this->doctrineBundle.':'.$this->doctrineName;
        $properties = Tools\ReflectClass::getProps($this->usingClassName);
        foreach ($data as $key => $value) {
            if (in_array($key, $properties)) {
                $this->$key = $value;
            }
        }
    }

    public function setAttribute($attrName, $value)
    {
        $this->$attrName = $value;
    }

    public function getAttribute($attrName)
    {
        return $this->$attrName;
    }

    protected function build() {
        $doctrineName = $this->doctrineNamespace.$this->doctrineName;
        $this->doctrine = new $doctrineName();
    }

    abstract function setAttributes();

} 