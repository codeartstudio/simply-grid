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
 * @property-read string $route_param
 * @property-read string $confirm_title
 * @property-read string $confirm_description
 */
class ActionColumn extends ValidateContainer implements ColumnAwareInterface
{
	/**
	 * @inheritDoc
	 * @see ValidateContainer::getRequiredProperty()
	 */
	public function getRequiredProperty(): array
	{
		return [
			'title',
			'alias',
			'routes',
			'route_param',
			'confirm_title',
			'confirm_description',
		];
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
			'route_param' => 'string',
			'confirm_title' => 'string',
			'confirm_description' => 'string',
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
						$this->route_param => $model->getAttribute('id'),
					]
				),
				'delete_route' => route(
					$this->routes['delete'],
					[
						'locale' => locale()->current()->value,
						$this->route_param => $model->getAttribute('id'),
					]
				),
				'confirm_title' => $this->confirm_title,
				'confirm_description' => $this->confirm_description,
			]
		)->render();
	}
}