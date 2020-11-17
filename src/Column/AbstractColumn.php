<?php

namespace CaS\SimplyGrid\Column;

use CaS\SimplyGrid\Pub\Container\ColumnContainer;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Abstract class for all columns
 * @package CaS\SimplyGrid\Column
 */
abstract class AbstractColumn
{
    /**
     * Render column
     * @param ColumnContainer $column
     * @param EloquentModel $model
     * @return string
     */
    abstract public function render(ColumnContainer $column, EloquentModel $model): string;
}