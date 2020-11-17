<?php

namespace CaS\SimplyGrid\Pub\Filter;

use CaS\SimplyGrid\AwareInterface\FilterAwareInterface;
use CaS\SimplyGrid\Container\ValidateContainer;

/**
 * Show date picker filter
 * @property-read string $attribute
 */
class DateFilter extends ValidateContainer implements FilterAwareInterface
{
	/**
	 * @inheritDoc
	 * @see ValidateContainer::getRequiredProperty()
	 */
	public function getRequiredProperty(): array
	{
		return ['attribute'];
	}

	/**
	 * @inheritDoc
	 * @see ValidateContainer::getPropertyType()
	 */
	public function getPropertyType(): array
	{
		return [
			'attribute' => 'string',
		];
	}

	/**
	 * @inheritDoc
	 * @see FilterAwareInterface::render()
	 */
    public function render(): string
    {
        return view('cas_simplygrid::filters.date', ['attribute' => $this->attribute])->render();
    }
}