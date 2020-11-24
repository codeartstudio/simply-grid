<div class="d-flex justify-content-center">
    @if($mark_active_route && $is_mark_available)
        @if($is_mark_active)
            <button class="btn btn-sm btn-clean btn-icon">
                <span class="svg-icon svg-icon-warning svg-icon-md">
                    {{ Metronic::getSVG('media/svg/icons/General/Star.svg') }}
                </span>
            </button>
        @else
            <form action="{{ $mark_active_route }}" method="post" class="">
                @csrf

                <button type="submit" class="btn btn-sm btn-clean btn-icon">
                    <span class="svg-icon svg-icon-md">
                        {{ Metronic::getSVG('media/svg/icons/General/Star.svg') }}
                    </span>
                </button>
            </form>
        @endif
    @endif

    <a href="{{ $edit_route }}" class="btn btn-sm btn-clean btn-icon">
        <span class="svg-icon svg-icon-md">
            {{ Metronic::getSVG('media/svg/icons/General/Edit.svg') }}
        </span>
    </a>

    <button type="button" class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#confirm-delete-modal">
        <span class="svg-icon svg-icon-md">
            {{ Metronic::getSVG('media/svg/icons/General/Trash.svg') }}
        </span>
    </button>

    <!-- Modal-->
    <div class="modal fade" id="confirm-delete-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="confirm-delete-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm-delete-label">{{ $confirm_title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">{{ $confirm_description }}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger font-weight-bold" data-comfirm="delete" onclick="KTGridInitiator.delete();">
                        {{ __('grid.button-delete-confirm') }}
                    </button>
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                        {{ __('grid.button-delete-cancel') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ $delete_route }}" method="post" class="" data-delete-form>
        @csrf
        @method('delete')
    </form>
</div>