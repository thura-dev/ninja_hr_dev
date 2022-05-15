@extends('layouts.app')
@section('title','Edit Company Setting')
@section('extra_css')
<style>
    .daterangepicker .drp-calendar .left{
        margin-right:8px !important;
    }
</style>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('company-setting.update',$setting->id) }}" method="POST" autocomplete="off" id="edit-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="md-form">
                    <label for="">Company Name</label>
                    <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}">
                </div>
                <div class="md-form">
                    <label for="">Company Phone</label>
                    <input type="text" name="company_phone" class="form-control" value="{{ $setting->company_phone }}">
                </div><div class="md-form">
                    <label for="">Company Email</label>
                    <input type="text" name="company_email" class="form-control" value="{{ $setting->company_email }}">
                </div><div class="md-form">
                    <label for="">Company Address</label>
                   <textarea class="form-control md-textarea pt-2" name="company_address">{{ $setting->company_address }}</textarea>
                </div><div class="md-form">
                    <label for="">Office Start Time</label>
                    <input type="text" name="office_start_time" class="form-control timepicker" value="{{ $setting->office_start_time }}">
                </div><div class="md-form">
                    <label for="">Office End Time</label>
                    <input type="text" name="office_end_time" class="form-control timepicker" value="{{ $setting->office_end_time }}">
                </div><div class="md-form">
                    <label for="">Break Start Time</label>
                    <input type="text" name="break_start_time" class="form-control timepicker" value="{{ $setting->break_start_time }}">
                </div>
                <div class="md-form">
                    <label for="">Break End Time</label>
                    <input type="text" name="break_end_time" class="form-control timepicker" value="{{ $setting->break_end_time }}">
                </div>
                 @can('edit_company_setting')
                <div class="d-flex justify-content-center mt-5 mb-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-theme btn-block btn-sm">Confirm</button>
                    </div>
                </div>
                @endcan
            </form>

        </div>
    </div>
    @endsection
    @section('scripts')
    {!!JsValidator::formRequest('App\Http\Requests\UpdateCompanySetting', '#edit-form');!!}
    <script>
        $(document).ready(function(){
            $('.timepicker').daterangepicker({
            "autoApply": true,
            "singleDatePicker": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "timePickerSeconds": true,
            "locale": {
                "format": "HH:mm:ss",
            }
            }).on('show.daterangepicker', function(ev, picker) {
                $('.calendar-table').hide();
            });




});
    </script>
@endsection



