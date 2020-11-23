<div class="d-flex">
    <a href="{{ $edit_route }}" class="btn btn-sm btn-clean btn-icon mr-2">
        <span class="svg-icon svg-icon-md">
            {{ Metronic::getSVG('media/svg/icons/General/Edit.svg') }}
        </span>
    </a>

    <button type="button" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="modal" data-target="#confirm-delete-modal">
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