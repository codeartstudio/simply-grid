<?php

namespace CaS\SimplyGrid\Pub\Container;

use CaS\SimplyGrid\Container\ValidateContainer;
use CaS\SimplyGrid\Filter\AbstractFilter;

/**
 * Grid filters container
 *
 * @property-read string $title
 * @property-read AbstractFilter $type
 * @property-read string $attribute
 * @property-read string $values
 *
 * @package CaS\SimplyGrid\Pub\Container
 */
class FilterContainer extends ValidateContainer
{
    /**
     * @inheritDoc
     * @see ValidateContainer::getAdditionalProperty()
     */
    public function getAdditionalProperty(): array
    {
        return [
            'values' => [],
        ];
    }

    /**
     * @inheritDoc
     * @see ValidateContainer::getRequiredProperty()
     */
    public function getRequiredProperty(): array
    {
        return ['title', 'type', 'attribute'];
    }

    /**
     * @inheritDoc
     * @see ValidateContainer::getPropertyType()
     */
    public function getPropertyType(): array
    {
        return [
            'title' => 'string',
            'type' => AbstractFilter::class,
            'attribute' => 'string',
            'values' => 'array',
        ];
    }

    /**
     * Get filter type class
     * @return AbstractFilter
     */
    public function getClass(): AbstractFilter
    {
        return new $this->type();
    }
}