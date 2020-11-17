<?php

namespace CaS\SimplyGrid\Filter;

use CaS\SimplyGrid\Pub\Container\FilterContainer;

/**
 * Show single select filter
 * @package CaS\SimplyGrid\Filter
 */
class SelectFilter extends AbstractFilter
{
    /**
     * @inheritDoc
     * @see AbstractFilter::render()
     */
    public function render(FilterContainer $filter): string
    {
        return view('cas_simplygrid::filters.select', ['filter' => $filter])->render();
    }
}