@extends('layouts.app')
@section('title','Edit Permission')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permission.update',$permissions->id) }}" method="POST" autocomplete="off" id="edit-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="md-form">
                    <label for="">Title</label>
                    <input type="text" name="name" class="form-control" value="{{ $permissions->name }}">
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
    {!!JsValidator::formRequest('App\Http\Requests\UpdatePermission', '#edit-form');!!}
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

});
    </script>
@endsection




