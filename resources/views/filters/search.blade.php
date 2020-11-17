<div class="col-md-4 my-2 my-md-0">
    <div class="input-icon">
        <input
                type="text"
                class="form-control"
                name="{{ $attribute }}"
                placeholder="{{ $title }}"
                value="{{ old($attribute) }}"
                id="kt_datatable_search_{{ $attribute }}" />
        <span><i class="flaticon2-search-1 text-muted"></i></span>
    </div>
</div>