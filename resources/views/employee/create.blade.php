
@extends('layouts.app')
@section('title','Create Employees')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('employee.store') }}" method="POST" autocomplete="off" id="create-form" enctype="multipart/form-data">
                @csrf

                <div class="md-form">
                    <label for="">Employee ID</label>
                    <input type="text" name="employee_id" class="form-control">
                </div>
                <div class="md-form">
                    <label for="">Name</label>

                    <input type="text" name="neme" id="name" class="form-control">
                </div>
                <div class="md-form">
                    <label for="">Phone</label>
                    <input type="number" name="neme" id="phone" class="form-control">
                </div>
                <div class="md-form">
                    <label for="">Email</label>
                    <input type="email" name="neme" id="email" class="form-control">
                </div>
                <div class="md-form">
                    <label for="">NRC Number</label>
                    <input type="text" name="nrc_number" class="form-control">
                </div>
                <div class="">
                    <label for="">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>

                    <input type="text" name="name" class="form-control">
                </div>
                <div class="md-form">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control p-1">
                </div>
                <div class="md-form">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="md-form">
                    <label for="">NRC Number</label>
                    <input type="number" name="nrc_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>

                    </select>
                </div>
                <div class="md-form">
                    <label for="">Birthday</label>

                    <input type="text" name="nrc_number" class="form-control birthday">
                </div>

            </form>
        </div>
    </div>
{{-- @endsection --}}
{{-- @section('scripts')
    <script>
        $('.birthday').daterangepicker({

        });
    </script>
@endsection --}}

    @endsection
    @section('scripts')
    {!!JsValidator::formRequest('App\Http\Requests\StoreEmployee', '#create-form');!!}
    <script>
        $(document).ready(function(){
            $('.birthday').daterangepicker({
            "autoApply": true,
            "maxDate":moment(),
            "singleDatePicker": true,
            "showDropdowns": true,
            "locale": {
            "format": "YYYY-MM-DD",
            }
            });
            $('.date_of_join').daterangepicker({
                        "autoApply": true,
                        "maxDate":moment(),
                        "singleDatePicker": true,
                        "showDropdowns": true,
                        "locale": {
                            "format": "YYYY-MM-DD",
                        }
            })
            $('#profile_img').on('change', function(){
                var file_length=document.getElementById('profile_img').files.length;
                $('.preview_img').html('');
                for(i=0;i<file_length;i++){
                    $('.preview_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}"/>`)
                }

            })
});
    </script>
@endsection


