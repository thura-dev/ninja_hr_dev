<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.index');
    }
    public function ssd()
    {
        $employee = User::query();

        return Datatables::of($employee)
        ->addColumn('department_name',function($each){
            return $each->department ? $each->department->title :'-';
        })
        ->editColumn('is_present',function($each){
            if($each->is_present==1){
                return '<span class="badge badge-pill badge-success">Present</span>';
            }else{
                return '<span class="badge badge-success">Success</span>';
            }
        })
        ->rawColumns(['is_present'])
        ->make(true);
    }
    public function create(){
        return view('employee.create');
    }
}
