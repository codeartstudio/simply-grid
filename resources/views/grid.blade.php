@if(count($grid->getFilterList()) > 0)
    <!--begin::Search Form-->
    <div class="mt-2 mb-7">
        <form action="" method="get" class="row align-items-center">
            @csrf

            <div class="col-lg-12">
                <div class="row align-items-center">
                    @foreach($grid->getFilterList() as $filter)
                        {!! $filter->render() !!}
                    @endforeach
                    <div class="col-md-3 my-2 my-md-0">
                        <button type="submit" class="btn btn-light-primary px-6 font-weight-bold">
                            {{ __('grid.button-search-submit') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end::Search Form-->
@endif

<!--begin: Datatable-->
<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
    <table>
        <thead>
        <tr>
            @foreach($grid->getColumnList() as $column)
                <th data-alias="{{ $column->alias }}">{{ $column->title }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($grid->getPaginator() as $model)
            <tr>
                @foreach($grid->getColumnList() as $column)
                    <td data-alias="{{ $column->alias }}">{!! $column->render($model) !!}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Pagination -->
    {{ $grid->getPaginator()->links() }}
    <!-- /Pagination -->
</div>
<!--end: Datatable-->

{{-- Scripts Section --}}
@section('scripts')
    <script>
        var KTGridInitiator = function () {
            // Private functions
            var confirmDelete = function () {
                $('form[data-delete-form]').submit();
            }

            var grids = function () {
                new KTGrid(
                    'kt_datatable',
                    {
                        columns: [
                            {
                                alias: 'status',
                                width: 100,
                            },
                            {
                                alias: 'actions',
                                width: 100,
                                autoHide: false,
                            }
                        ],
                        translate: {
                            records: {
                                processing: '{{ __('grid.processing') }}',
                                noRecords: '{{ __('grid.no-records') }}',
                            },
                        },
                    }
                );
            }

            return {
                // public functions
                init: function() {
                    grids();
                },
                delete: function () {
                    confirmDelete();
                }
            };
        }();

        var KTBootstrapDatepicker = function () {
            // Private functions
            var datepickers = function () {
                // enable clear button
                var $kt_datepicker = $('#kt_datepicker');
                if (!$kt_datepicker.length) {
                    return;
                }

                $($kt_datepicker).datepicker({
                    rtl: false,
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    datepickers();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTGridInitiator.init();
            KTBootstrapDatepicker.init();
            $('input, select').selectpicker();
        });
    </script>
@endsection