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
		$mark_active_route = null;
		$is_mark_active = false;
		$is_mark_available = false;
		if (array_key_exists('mark', $this->routes)) {
			$is_mark_active = $model->isMarkActive();
			$is_mark_available = $model->isMarkAvailable();
			$mark_active_route = path(
				$this->routes['mark'],
				[
					$this->route_param => $model->getAttribute('id')
				]
			);
		}

		return view(
			'cas_simplygrid::columns.action',
			[
				'edit_route' => path(
					$this->routes['edit'],
					[
						$this->route_param => $model->getAttribute('id'),
					]
				),
				'delete_route' => path(
					$this->routes['delete'],
					[
						$this->route_param => $model->getAttribute('id'),
					]
				),
				'is_mark_active' => $is_mark_active,
				'is_mark_available' => $is_mark_available,
				'mark_active_route' => $mark_active_route,
				'confirm_title' => $this->confirm_title,
				'confirm_description' => $this->confirm_description,
			]
		)->render();
	}
}