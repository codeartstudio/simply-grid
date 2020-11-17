<?php

namespace CaS\SimplyGrid\Pub;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Abstract grid
 */
abstract class AbstractGrid
{
    /**
     * Get column list
     * @return array
     */
    abstract public function getColumnList(): array;

    /**
     * Get filter list
     * @return array
     */
    abstract public function getFilterList(): array;

    /**
     * Get model class instance for grid
     * @return LengthAwarePaginator
     */
    abstract public function getPaginator(): LengthAwarePaginator;
}