<a href="{{ $edit_route }}" class="btn btn-sm btn-clean btn-icon mr-2">
    <span class="svg-icon svg-icon-md">
        {{ Metronic::getSVG('media/svg/icons/General/Edit.svg') }}
    </span>
</a>

<form action="{{ $delete_route }}" method="post" class="">
    @csrf
    @method('delete')

    <button type="submit" class="btn btn-sm btn-clean btn-icon">
        <span class="svg-icon svg-icon-md">
            {{ Metronic::getSVG('media/svg/icons/General/Trash.svg') }}
        </span>
    </button>
</form>