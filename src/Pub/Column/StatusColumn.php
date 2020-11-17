<?php

namespace CaS\SimplyGrid\Pub\Column;

use CaS\SimplyGrid\AwareInterface\ColumnAwareInterface;
use CaS\SimplyGrid\Container\ValidateContainer;
use CaS\SimplyGrid\Exception\BadUsageException;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Show grid status column
 * @property-read string $title
 * @property-read string $attribute
 * @property-read array $values
 */
class StatusColumn extends ValidateContainer implements ColumnAwareInterface
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
	 * @see ColumnAwareInterface::render()
	 */
    public function render(EloquentModel $model): string
    {
    	$attribute = $model->getAttribute($this->attribute);
    	$value_map = $this->_getKeyValue($attribute);

        return view(
            'cas_simplygrid::columns.status',
            [
	            'attribute_class' => $value_map['class'],
	            'attribute_title' => $value_map['title'],
            ]
        )->render();
    }

	/**
	 * Get value by key
	 * @param $key
	 * @return mixed
	 * @throws BadUsageException
	 */
	private function _getKeyValue($key)
	{
		if (!isset($this->values[$key])) {
			throw new BadUsageException(
				sprintf('Property [%s] not exists in array %s', $key, implode(',', $this->values))
			);
		}

		return $this->values[$key];
	}
}