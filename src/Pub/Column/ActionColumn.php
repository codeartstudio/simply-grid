<?php

namespace CaS\SimplyGrid\Pub\Column;

use CaS\SimplyGrid\AwareInterface\ColumnAwareInterface;
use CaS\SimplyGrid\Container\ValidateContainer;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Show grid actions column
 * @property-read string $edit
 * @property-read string $delete
 */
class ActionColumn extends ValidateContainer implements ColumnAwareInterface
{
	/**
	 * @inheritDoc
	 * @see ValidateContainer::getRequiredProperty()
	 */
	public function getRequiredProperty(): array
	{
		return ['edit', 'delete'];
	}

	/**
	 * @inheritDoc
	 * @see ValidateContainer::getPropertyType()
	 */
	public function getPropertyType(): array
	{
		return [
			'edit' => 'string',
			'delete' => 'string',
		];
	}

	/**
	 * @inheritDoc
	 * @see ColumnAwareInterface::render()
	 */
    public function render(EloquentModel $model): string
    {
        return view(
        	'cas_simplygrid::columns.action',
	        [
	        	'edit_route' => route(
			        $this->edit,
			        [
				        'locale' => locale()->current()->value,
				        'id' => $model->getAttribute('id'),
			        ]
		        ),
	        	'delete_route' => route(
			        $this->delete,
			        [
				        'locale' => locale()->current()->value,
				        'id' => $model->getAttribute('id'),
			        ]
		        ),
	        ]
        )->render();
    }
}