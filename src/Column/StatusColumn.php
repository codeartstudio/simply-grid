<?php

namespace CaS\SimplyGrid\Column;

use CaS\SimplyGrid\Pub\Container\ColumnContainer;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Show grid status column
 * @package CaS\SimplyGrid\Column
 */
class StatusColumn extends AbstractColumn
{
    /**
     * @inheritDoc
     * @see AbstractColumn::render()
     */
    public function render(ColumnContainer $column, EloquentModel $model): string
    {
        return view('cas_simplygrid::columns.status', ['column' => $column, 'model' => $model])->render();
    }
}