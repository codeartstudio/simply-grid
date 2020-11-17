<?php

namespace CaS\SimplyGrid\Pub\Filter;

use CaS\SimplyGrid\AwareInterface\FilterAwareInterface;
use CaS\SimplyGrid\Container\ValidateContainer;

/**
 * Show single select filter
 * @property-read string $title
 * @property-read string $attribute
 * @property-read array $values
 */
class SelectFilter extends ValidateContainer implements FilterAwareInterface
{
	/**
	 * @inheritDoc
	 * @see ValidateContainer::getRequiredProperty()
	 */
	public function getRequiredProperty(): array
	{
		return ['title', 'attribute', 'values'];
	}

	/**
	 * @inheritDoc
	 * @see ValidateContainer::getPropertyType()
	 */
	public function getPropertyType(): array
	{
		return [
			'title' => 'string',
			'attribute' => 'string',
			'values' => 'array',
		];
	}

	/**
	 * @inheritDoc
	 * @see FilterAwareInterface::render()
	 */
    public function render(): string
    {
        return view(
        	'cas_simplygrid::filters.select',
	        [
	        	'title' => $this->title,
	        	'attribute' => $this->attribute,
	        	'values' => $this->values,
	        ]
        )->render();
    }
}