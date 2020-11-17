<?php

namespace CaS\SimplyGrid\Pub;

use CaS\SimplyGrid\Pub\Container\ColumnContainer;
use CaS\SimplyGrid\Pub\Container\FilterContainer;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * AbstractGrid
 * @package CaS\SimplyGrid
 */
abstract class AbstractGrid
{
    /**
     * Get column list
     * @return ColumnContainer[]
     */
    abstract public function getColumnList(): array;

    /**
     * Get filter list
     * @return FilterContainer[]
     */
    abstract public function getFilterList(): array;

    /**
     * Get action router list
     * @return array
     */
    abstract public function getRouterList(): array;

    /**
     * Get model class instance for grid
     * @return LengthAwarePaginator
     */
    abstract public function getPaginator(): LengthAwarePaginator;
}