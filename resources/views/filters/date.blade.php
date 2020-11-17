<div class="col-md-4 my-2 my-md-0">
    <div class="input-group date">
        <input
                type="text"
                class="form-control"
                readonly="readonly"
                value="{{ date('d/m/Y') }}"
                id="kt_datepicker"
                name="{{ $filter['attribute'] }}" />
        <div class="input-group-append">
            <span class="input-group-text"><i class="la la-calendar"></i></span>
        </div>
    </div>
</div>

{{-- Scripts Section --}}
@section('scripts')
    <script>
        var KTBootstrapDatepicker = function () {
            // Private functions
            var datepickers = function () {
                // enable clear button
                $('#kt_datepicker').datepicker({
                    rtl: false,
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: {
                        leftArrow: '&lt;i class="la la-angle-left"&gt;&lt;/i&gt;',
                        rightArrow: '&lt;i class="la la-angle-right"&gt;&lt;/i&gt;'
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
            KTBootstrapDatepicker.init();
        });
    </script>
@endsection
