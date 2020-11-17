<?php

namespace CaS\SimplyGrid\Column;

use CaS\SimplyGrid\Pub\Container\ColumnContainer;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Show grid actions column
 * @package CaS\SimplyGrid\Column
 */
class ActionColumn extends AbstractColumn
{
    /**
     * @inheritDoc
     * @see AbstractColumn::render()
     */
    public function render(ColumnContainer $column, EloquentModel $model): string
    {
        return view('cas_simplygrid::columns.action', ['column' => $column, 'model' => $model])->render();
    }
}