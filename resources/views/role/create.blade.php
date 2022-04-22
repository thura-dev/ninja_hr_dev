@extends('layouts.app')
@section('title','Create Role')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('role.store') }}" method="POST" autocomplete="off" id="create-form" enctype="multipart/form-data">
                @csrf

                <div class="md-form">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <label for="">Permission</label>
               <div class="row">
                   @foreach ($permissions as $permission)
                   <div class="col-md-3 col-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="permissions[]" id="checkbox_{{ $permission->id }}" value="{{ $permission->name }}">
                        <label class="custom-control-label" for="checkbox_{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                </div>
                @endforeach
               </div>
                <div class="d-flex justify-content-center mt-5 mb-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-theme btn-block btn-sm">Confirm</button>
                    </div>
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
    {!!JsValidator::formRequest('App\Http\Requests\StoreRole', '#create-form');!!}
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
            // $('#profile_img').on('change', function(){
            //     var file_length=document.getElementById('profile_img').files.length;
            //     $('.preview_img').html('');
            //     for(i=0;i<file_length;i++){
            //         $('.preview_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}"/>`)
            //     }

            // })
});
    </script>
@endsection


