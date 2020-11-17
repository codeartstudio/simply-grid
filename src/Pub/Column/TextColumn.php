<?php

namespace CaS\SimplyGrid\Pub\Column;

use CaS\SimplyGrid\AwareInterface\ColumnAwareInterface;
use CaS\SimplyGrid\Container\ValidateContainer;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Show grid text column
 * @property-read string $title
 * @property-read string $attribute
 */
class TextColumn extends ValidateContainer implements ColumnAwareInterface
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
	 * @see ColumnAwareInterface::render()
	 */
    public function render(EloquentModel $model): string
    {
	    if (strpos($this->attribute, '.') !== false) {
		    [$relation, $field] = explode('.', $this->attribute);
		    $attribute = $model->getRelationValue($relation)->$field;
	    } else {
		    $attribute = $model->getAttribute($this->attribute);
	    }

	    return view('cas_simplygrid::columns.text', ['attribute' => $attribute])->render();
    }
}