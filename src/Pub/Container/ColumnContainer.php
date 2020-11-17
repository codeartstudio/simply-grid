<?php

namespace CaS\SimplyGrid\Pub\Container;

use CaS\SimplyGrid\Column\AbstractColumn;
use CaS\SimplyGrid\Container\ValidateContainer;

/**
 * Grid columns container
 *
 * @property-read string $title
 * @property-read AbstractColumn $type
 * @property-read string $attribute
 * @property-read array $values
 *
 * @package CaS\SimplyGrid\Pub\Container
 */
class ColumnContainer extends ValidateContainer
{
    /**
     * @inheritDoc
     * @see ValidateContainer::getAdditionalProperty()
     */
    public function getAdditionalProperty(): array
    {
        return [
            'values' => []
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
            'type' => AbstractColumn::class,
            'attribute' => 'string',
            'values' => 'array',
        ];
    }

    /**
     * Get column type class
     * @return AbstractColumn
     */
    public function getClass(): AbstractColumn
    {
        return new $this->type();
    }
}