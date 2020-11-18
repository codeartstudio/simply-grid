<?php

namespace CaS\SimplyGrid;

use CaS\SimplyGrid\Pub\AbstractGrid;

/**
 * Simply Grid in Laravel
 */
class SimplyGrid
{
    /**
     * @param AbstractGrid $grid
     * @return string
     */
    public function render(AbstractGrid $grid): string
    {
        return view('cas_simplygrid::grid', ['grid' => $grid])->render();
    }
}