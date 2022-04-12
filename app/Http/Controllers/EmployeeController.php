<?php

namespace App\Http\Controllers;

use App\User;
use App\Department;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreEmployee;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.index');
    }
    public function ssd()
    {
        $employee = User::with('department');

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
        $departments=Department::orderBy('title')->get();
        return view('employee.create',compact('departments'));
    }

    public function store(StoreEmployee $request){
        $employee =new User();
        $employee->employee_id=$request->emplpoyee_id;
        $employee->name=$request->name;
        $employee->phone=$request->phone;
        $employee->emial=$request->emial;
        $employee->nrc_number=$request->nrc_number;
        $employee->gender=$request->gender;
        $employee->birthday=$request->birthday;
        $employee->address=$request->address;
        $employee->department_id=$request->department_id;
        $employee->date_of_join=$request->date_of_join;
        $employee->is_present=$request->is_present;
        $employee->password=$request->password;
        $employee->save();
        return redirect()->route('employee.index')->with('create','Employee is successfully created!');

    }
}
