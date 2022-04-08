
@extends('layouts.app')
@section('title','Employees')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered Datatable">
               <thead>
                   <th class="text-center">Employees ID</th>
                   <th class="text-center">Name</th>
                   <th class="text-center">Email</th>
                   <th class="text-center">Phone</th>
                   <th class="text-center">Department</th>
                   <th class="text-center">Is Present</th>

               </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
        $('.Datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax:'/employee/datatable/ssd',
            columns: [
                { data: 'employee_id', name: 'employee_id',class:'text-center' },
                { data: 'name', name: 'name',class:'text-center' },
                { data: 'phone', name: 'phone',class:'text-center' },
                { data: 'email', name: 'email',class:'text-center' },
                { data: 'department_name', name: 'department_name',class:'text-center' },
                { data: 'is_present', name: 'is_present',class:'text-center' }

            ]
        });
    })
    </script>
@endsection
