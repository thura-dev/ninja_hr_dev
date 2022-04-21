@extends('layouts.app')
@section('title','Edit Role')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('role.update',$role->id) }}" method="POST" autocomplete="off" id="edit-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="md-form">
                    <label for="">Title</label>
                    <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                </div>

                <div class="d-flex justify-content-center mt-5 mb-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-theme btn-block btn-sm">Confirm</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    @endsection
    @section('scripts')
    {!!JsValidator::formRequest('App\Http\Requests\UpdateRole', '#edit-form');!!}
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



