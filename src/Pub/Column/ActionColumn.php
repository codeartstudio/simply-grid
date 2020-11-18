<?php

namespace CaS\SimplyGrid\Pub\Column;

use CaS\SimplyGrid\AwareInterface\ColumnAwareInterface;
use CaS\SimplyGrid\Container\ValidateContainer;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Show grid actions column
 * @property-read string $title
 * @property-read string $alias
 * @property-read array $routes
 */
class ActionColumn extends ValidateContainer implements ColumnAwareInterface
{
	/**
	 * @inheritDoc
	 * @see ValidateContainer::getRequiredProperty()
	 */
	public function getRequiredProperty(): array
	{
		return ['title', 'alias', 'routes'];
	}

	/**
	 * @inheritDoc
	 * @see ValidateContainer::getPropertyType()
	 */
	public function getPropertyType(): array
	{
		return [
			'title' => 'string',
			'alias' => 'string',
			'routes' => 'array',
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
			        $this->routes['edit'],
			        [
				        'locale' => locale()->current()->value,
				        'id' => $model->getAttribute('id'),
			        ]
		        ),
	        	'delete_route' => route(
			        $this->routes['delete'],
			        [
				        'locale' => locale()->current()->value,
				        'id' => $model->getAttribute('id'),
			        ]
		        ),
	        ]
        )->render();
    }
}