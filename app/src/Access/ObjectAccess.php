<?php
declare(strict_types=1);

namespace App\Access;

use ReflectionObject;

class ObjectAccess
{
    private $obj;

    /**
     * @var ReflectionObject
     */
    private ReflectionObject $reflectionObject;

    /**
     * ObjectAccess constructor.
     * @param $obj
     */
    public function __construct($obj)
    {
        $this->obj = $obj;
        $this->reflectionObject = new  ReflectionObject($this->obj);

    }

    public function getPropertyValue(string $propertyName)
    {
        $property = $this->reflectionObject->getProperty($propertyName);
        $property->setAccessible(true);

        return $property->getValue($this->obj);
    }

    public function setPropertyValue(string $propertyName, $value)
    {
        $property = $this->reflectionObject->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($this->obj, $value);
    }
}