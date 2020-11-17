<?php

namespace CaS\SimplyGrid\AwareInterface;

use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Column aware interface
 */
interface ColumnAwareInterface
{
	/**
	 * Render column data
	 * @param EloquentModel $model
	 * @return string
	 */
	public function render(EloquentModel $model): string;
}