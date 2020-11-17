<?php

namespace CaS\SimplyGrid\Pub\Filter;

use CaS\SimplyGrid\AwareInterface\FilterAwareInterface;
use CaS\SimplyGrid\Container\ValidateContainer;

/**
 * Show input search filter
 * @property-read string $title
 * @property-read string $attribute
 */
class SearchFilter extends ValidateContainer implements FilterAwareInterface
{
	/**
	 * @inheritDoc
	 * @see ValidateContainer::getRequiredProperty()
	 */
	public function getRequiredProperty(): array
	{
		return ['title', 'attribute'];
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
		];
	}

	/**
	 * @inheritDoc
	 * @see FilterAwareInterface::render()
	 */
    public function render(): string
    {
        return view('cas_simplygrid::filters.search', ['title' => $this->title, 'attribute' => $this->attribute])->render();
    }
}