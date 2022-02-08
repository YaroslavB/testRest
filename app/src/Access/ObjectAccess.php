<?php
declare(strict_types=1);

namespace App\Access;

use ReflectionException;
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
     * @param object $obj
     */
    public function __construct($obj)
    {
        $this->obj = $obj;
        $this->reflectionObject = new  ReflectionObject($this->obj);

    }

    /**
     * @param string $propertyName
     * @return mixed
     * @throws ReflectionException
     */
    public function getPropertyValue(string $propertyName)
    {
        $property = $this->reflectionObject->getProperty($propertyName);
        $property->setAccessible(true);

        return $property->getValue($this->obj);
    }

    /**
     * @param string $propertyName
     * @param $value
     * @throws ReflectionException
     */
    public function setPropertyValue(string $propertyName, $value): void
    {
        $property = $this->reflectionObject->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($this->obj, $value);
    }
}