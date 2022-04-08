
@extends('layouts.app')
@section('title','Create Employees')
@section('content')

    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
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
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
