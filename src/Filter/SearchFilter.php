<?php

namespace CaS\SimplyGrid\Filter;

use CaS\SimplyGrid\Pub\Container\FilterContainer;

/**
 * Show input search filter
 * @package CaS\SimplyGrid\Filter
 */
class SearchFilter extends AbstractFilter
{
    /**
     * @inheritDoc
     * @see AbstractFilter::render()
     */
    public function render(FilterContainer $filter): string
    {
        return view('cas_simplygrid::filters.search', ['filter' => $filter])->render();
    }
}