@extends('layouts.app')
@section('title','Edit Employees')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('employee.store') }}" method="POST" autocomplete="off" id="create-form">
                @csrf
                <div class="md-form">
                    <label for="">Employee ID</label>
                    <input type="text" name="employee_id" class="form-control" value="{{ $employee->employee_id }}">
                </div>
                <div class="md-form">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
                </div>
                <div class="md-form">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control" value="{{ $employee->phone }}">
                </div>
                <div class="md-form">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                </div>
                <div class="md-form">
                    <label for="">NRC Number</label>
                    <input type="number" name="nrc_number" class="form-control" value="{{ $employee->nrc_number }}">
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="male" @if($employee->gender == 'male') selected @endif>Male</option>
                        <option value="female" @if($employee->gender == 'female') selected @endif>Female</option>
                    </select>
                </div>
                <div class="md-form">
                    <label for="">Birthday</label>
                    <input type="text" name="birthday" class="form-control birthday" value="{{ $employee->birthday }}">
                </div>
                <div class="md-form">
                    <label>Address</label>
                    <textarea class="md-textarea form-control" rows="3" name="address">{{ $employee->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Department</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @if($employee->department_id ==$department->id) selected @endif>{{ $department->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md-form">
                    <label for="">Date of Join</label>
                    <input type="text" name="date_of_join" class="form-control date_of_join" value="{{ $employee->date_of_join }}">
                </div>
                <div class="form-group">
                    <label for="">Is Present?</label>
                    <select name="is_present" class="form-control">
                        <option value="1" @if($employee->is_present==1) selected @endif>Yes</option>
                        <option value="0" @if($employee->is_present==0) selected @endif>No</option>
                    </select>
                </div>
                <div class="md-form">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
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
});
    </script>
@endsection




