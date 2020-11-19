<div class="col-md-3 my-2 my-md-0">
    <div class="input-group date">
        <input
                type="text"
                class="form-control"
                readonly="readonly"
                value="{{ old($attribute) ?? date('m/d/Y') }}"
                id="kt_datepicker"
                name="{{ $attribute }}" />
        <div class="input-group-append">
            <span class="input-group-text"><i class="la la-calendar"></i></span>
        </div>
    </div>
</div>