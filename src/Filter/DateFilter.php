<?php

namespace CaS\SimplyGrid\Filter;

use CaS\SimplyGrid\Pub\Container\FilterContainer;

/**
 * Show date picker filter
 * @package CaS\SimplyGrid\Filter
 */
class DateFilter extends AbstractFilter
{
    /**
     * @inheritDoc
     * @see AbstractFilter::render()
     */
    public function render(FilterContainer $filter): string
    {
        return view('cas_simplygrid::filters.date', ['filter' => $filter])->render();
    }
}