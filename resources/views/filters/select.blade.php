<div class="col-md-4 my-2 my-md-0">
    <div class="d-flex align-items-center">
        <label class="mr-3 mb-0 d-none d-md-block">{!! $title !!}</label>
        <select class="form-control" id="kt_datatable_search_{{ $attribute }}" name="{{ $attribute }}">
            @foreach($values as $option)
                <option value="{{ $option['value'] }}" @if(old($attribute) == $option['value']) selected="selected" @endif>
                    {!! $option['title'] !!}
                </option>
            @endforeach
        </select>
    </div>
</div>