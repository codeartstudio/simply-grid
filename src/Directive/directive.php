<?php

use CaS\SimplyGrid\Pub\AbstractGrid;
use CaS\SimplyGrid\SimplyGrid;

/**
 * Render a grid
 * @param AbstractGrid $grid
 * @return string
 */
function grid(AbstractGrid $grid): string
{
    return (new SimplyGrid())->render($grid);
}