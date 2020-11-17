@if(count($filter_list) > 0)
<!--begin::Search Form-->
<div class="mt-2 mb-7">
    <form action="" method="get" class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
            <div class="row align-items-center">
                @foreach($filter_list as $filter)
                    {!! $filter->type->render() !!}
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
            <button type="submit" class="btn btn-light-primary px-6 font-weight-bold">
                {{ __('grid.button-search-submit') }}
            </button>
        </div>
    </form>
</div>
<!--end::Search Form-->
@endif

<!--begin: Datatable-->
<table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
    <thead>
        <tr>
            @foreach($column_list as $column)
            <th title="{{ $column->title }}">{!! $column->title !!}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($grid->getPaginator() as $model)
        <tr>
            @foreach($column_list as $column)
            <td>{!! $column->type->render($model) !!}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->

<!-- Pagination -->
{{ $grid->getPaginator()->links() }}
<!-- /Pagination -->

{{-- Scripts Section --}}
@section('scripts')
    <script>
        jQuery(document).ready(function() {
            new KTGrid(
                'kt_datatable',
                {
                    translate: {
                        records: {
                            processing: '{{ __('grid.processing') }}',
                            noRecords: '{{ __('grid.no-records') }}',
                        },
                        toolbar: {
                            pagination: {
                                items: {
                                    default: {
                                        first: '{{ __('grid.pagination-first') }}',
                                        prev: '{{ __('grid.pagination-prev') }}',
                                        next: '{{ __('grid.pagination-next') }}',
                                        last: '{{ __('grid.pagination-last') }}',
                                        more: '{{ __('grid.pagination-more') }}',
                                        input: '{{ __('grid.pagination-input') }}',
                                        select: '{{ __('grid.pagination-select') }}',
                                        all: '{{ __('grid.pagination-all') }}',
                                    },
                                    info: '{{ __('grid.pagination-info') }}',
                                },
                            },
                        },
                    },
                }
            );
        });
    </script>
@endsection