@extends('layouts.app')
@section('title','Employees')
@section('content')
    <div>
        <a href="{{ route('employee.create') }}" class="btn btn-theme btn-sm">
            <i class="fas fa-plus-circle"></i>
            Create Employees
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered Datatable" style="width:100%">
               <thead>
                   <th class="text-center no-sort no-search"></th>
                   <th class="text-center">Employees ID</th>
                   <th class="text-center">Name</th>
                   <th class="text-center">Email</th>
                   <th class="text-center">Phone</th>
                   <th class="text-center">Department</th>
                   <th class="text-center">Is Present</th>
                   <th class="text-center">Action</th>
                   <th class="text-center hidden">Updated at</th>

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
            responsive: true,
            serverSide: true,
            ajax:'/employee/datatable/ssd',
            columns: [
                { data: 'plus-icon', name: 'plus-icon',class:'text-center' },
                { data: 'employee_id', name: 'employee_id',class:'text-center' },
                { data: 'name', name: 'name',class:'text-center' },
                { data: 'phone', name: 'phone',class:'text-center' },
                { data: 'email', name: 'email',class:'text-center' },
                { data: 'department_name', name: 'department_name',class:'text-center' },
                { data: 'is_present', name: 'is_present',class:'text-center' },
                { data: 'action', name: 'action',class:'text-center' },
                { data: 'updated_at', name: 'updated_at',class:'text-center' }

            ],
            order: [[ 8, "desc" ]],
            columnDefs: [

            // {
            //     "targets": [ 7 ],
            //     "visible": false
            // },
            {
                "targets": [ 0],
                "class": "control"
            },
            {
                "targets": "no-sort",
                "orderable": false
            },
            {
                "targets": "no-search",
                "searchable": false
            },
            {
                "targets": "hidden",
                "visible": false
            },
        ],
         language: {
                 "paginate": {
                    "previous": "<i class='far fa-arrow-alt-circle-left'></i>",
                     "next":"<i class='far fa-arrow-alt-circle-right'></i>"

                    },
                    "processing": "<img src='/image/loading.gif' style='width:50px'/><p>....Loaging...</p>"
                }

        });
    })
    </script>
@endsection
