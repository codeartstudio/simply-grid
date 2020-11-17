<?php

namespace CaS\SimplyGrid;

use CaS\SimplyGrid\Pub\AbstractGrid;

/**
 * Simply Grid in Laravel
 * @package CaS\SimplyGrid
 */
class SimplyGrid
{
    /**
     * @param AbstractGrid $grid
     * @return string
     */
    public function render(AbstractGrid $grid): string
    {
        return view(
                'cas_simplygrid::grid',
                [
                    'grid' => $grid,
                    'router_list' => $grid->getRouterList(),
                    'column_list' => $grid->getColumnList(),
                    'filter_list' => $grid->getFilterList(),
                ]
            )
            ->render();
    }
}