@if(in_array('edit', $column['values']))
<a href="{{ path($router_list['edit'], ['id' => $model->getAttribute('id')]) }}" class="btn btn-sm btn-clean btn-icon mr-2">
    <span class="svg-icon svg-icon-md">
        {{ Metronic::getSVG('media/svg/icons/General/Edit.svg') }}
    </span>
</a>
@endif

@if(in_array('delete', $column['values']))
<a href="{{ path($router_list['delete'], ['id' => $model->getAttribute('id')]) }}" class="btn btn-sm btn-clean btn-icon">
    <span class="svg-icon svg-icon-md">
        {{ Metronic::getSVG('media/svg/icons/General/Trash.svg') }}
    </span>
</a>
@endif