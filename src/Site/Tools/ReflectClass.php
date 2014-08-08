<?php
/**
 * Created by PhpStorm.
 * User: core
 * Date: 7/9/14
 * Time: 5:03 PM
 */

namespace Site\Tools;


class ReflectClass {
    static function getReflectClass($className) {
        $refClass = new \ReflectionClass($className);
        return $refClass;
    }

    /**
     * @param $className
     * @param array $type like array(0,1,2,3,4) 0: public 1: protected 2: private 3: static
     * @return array
     */
    static function getProps($className, $type = array()) {
        $properties = array();
        $refClass = self::getReflectClass($className);
        $propertiesTemp = $refClass->getProperties(\ReflectionProperty::IS_PROTECTED);
        foreach ($propertiesTemp as $key => $property) {
            array_push($properties, $property->getName());
        }
        return $properties;
    }
} 