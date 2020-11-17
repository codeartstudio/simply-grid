<?php

namespace CaS\SimplyGrid\Container;

use CaS\SimplyGrid\Exception\BadUsageException;
use CaS\SimplyGrid\Exception\ContainerValidationException;

/**
 * Container validation
 * @package CaS\SimplyGrid\Container
 */
abstract class ValidateContainer implements \ArrayAccess
{
    /**
     * @var array
     */
    private array $_data;

    /**
     * Get additional property list
     * @return array
     */
    abstract public function getAdditionalProperty(): array;

    /**
     * Get required property list
     * @return array
     */
    abstract public function getRequiredProperty(): array;

    /**
     * Get property type for validate
     * @return array
     */
    abstract public function getPropertyType(): array;

    /**
     * @param array $data
     * @throws ContainerValidationException
     */
    public function __construct(array $data)
    {
        $this->_checkRequiredProperties($data);
        $this->_checkForbiddenProperties($data);
        $this->_checkPropertyTypes($data);

        $this->_data = $data;
    }

    /**
     * Get a data by key
     *
     * @param string The key data to retrieve
     * @return mixed
     * @throws BadUsageException
     */
    public function __get ($key)
    {
        if (!isset($this->_data[$key])) {
            throw new BadUsageException(sprintf('Value by key [%s] not exists in container', $key));
        }

        return $this->_data[$key];
    }

    /**
     * Assigns a value to the specified data
     *
     * @param string The data key to assign the value to
     * @param mixed  The value to set
     * @throws BadUsageException
     */
    public function __set($key, $value)
    {
        throw new BadUsageException('Set method is not allowed in container');
    }

    /**
     * Whether or not an data exists by key
     *
     * @param string An data key to check for
     * @access public
     * @return boolean
     * @throws BadUsageException
     */
    public function __isset ($key): bool
    {
        throw new BadUsageException('Isset method is not allowed in container');
    }

    /**
     * Unsets an data by key
     *
     * @param string The key to unset
     * @throws BadUsageException
     */
    public function __unset($key)
    {
        throw new BadUsageException('Unset method is not allowed in container');
    }

    /**
     * Return raw array
     * @return array
     */
    public function toArray(): array
    {
        return $this->_data;
    }

    /**
     * @inheritDoc
     * @see \ArrayAccess::offsetExists()
     */
    public function offsetExists($offset)
    {
        return $this->__isset($offset);
    }

    /**
     * @inheritDoc
     * @see \ArrayAccess::offsetGet()
     */
    public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    /**
     * @inheritDoc
     * @see \ArrayAccess::offsetSet()
     */
    public function offsetSet($offset, $value)
    {
        $this->__set($offset, $value);
    }

    /**
     * @inheritDoc
     * @see \ArrayAccess::offsetUnset()
     */
    public function offsetUnset($offset)
    {
        $this->__unset($offset);
    }

    /**
     * Check required properties
     * @param array $data
     * @throws ContainerValidationException
     */
    private function _checkRequiredProperties(array $data)
    {
        $required_properties = array_flip($this->getRequiredProperty());
        $intersect_properties = array_intersect_key($required_properties, $data);
        if (count($intersect_properties) != count($required_properties)) {
            throw new ContainerValidationException(
                sprintf(
                    'Missing required properties [%s] in container %s',
                    implode(',', array_keys(array_diff_key($required_properties, $intersect_properties))),
                    self::class
                )
            );
        }
    }

    /**
     * Check forbidden properties
     * @param array $data
     * @throws ContainerValidationException
     */
    private function _checkForbiddenProperties(array $data)
    {
        $allowed_properties = array_flip($this->getRequiredProperty()) + array_keys($this->getAdditionalProperty());
        if (count(array_intersect_key($data, $allowed_properties)) != count($allowed_properties)) {
            throw new ContainerValidationException(
                sprintf(
                    'Properties [%s] are not declared in container %s',
                    implode(',', array_keys(array_diff_key($data, $allowed_properties))),
                    self::class
                )
            );
        }
    }

    /**
     * Check property types
     * @param array $data
     * @throws ContainerValidationException
     */
    private function _checkPropertyTypes(array $data)
    {
        $allowed_types = $this->getPropertyType();
        if (count($allowed_types) == 0) {
            return;
        }

        foreach ($data as $property => $value) {
            if (!isset($allowed_types[$property])) {
                continue;
            }

            $property_type = gettype($value);
            if ($property_type === 'object') {
                if (!$property_type instanceof $allowed_types[$property]) {
                    throw new ContainerValidationException(
                        sprintf('Property must instanceof [%s] given [%s]', $allowed_types[$property], get_class($property_type))
                    );
                }
            } else if ($property_type !== $allowed_types[$property]) {
                throw new ContainerValidationException(
                    sprintf('Property must be type [%s] given [%s]', $allowed_types[$property], $property_type)
                );
            }
        }
    }
}