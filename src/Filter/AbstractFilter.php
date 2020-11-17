<?php

namespace CaS\SimplyGrid\Filter;

use CaS\SimplyGrid\Pub\Container\FilterContainer;

/**
 * Abstract class for all filters
 * @package CaS\SimplyGrid\Filter
 */
abstract class AbstractFilter
{
    /**
     * Render filter
     * @param FilterContainer $filter
     * @return string
     */
    abstract public function render(FilterContainer $filter): string;
}