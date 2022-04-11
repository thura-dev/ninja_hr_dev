@extends('layouts.app')
@section('title','Create Employees')
@section('content')

    <div class="card">
        <div class="card-body">
            <form action="" method="POST" autocomplete="off">
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
                    </select>
                </div>
                <div class="md-form">
                    <label for="">Birthday</label>
                    <input type="text" name="nrc_number" class="form-control birthday">
                </div>

            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.birthday').daterangepicker({
       
        });
    </script>
@endsection
