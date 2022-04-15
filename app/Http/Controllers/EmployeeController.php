<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Department;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreEmployee;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateEmployee;
use Illuminate\Support\Facades\Storage;

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
        ->editColumn('updated_at',function($each){
            return Carbon::parse($each->updated_at)->format('Y-m-d H-i-s');
        })
        ->addColumn('plus-icon',function($each){
            return null;
        })
        ->addColumn('action',function($each){
           $edit_icon='<a href="'.route('employee.edit',$each->id).'" class="text-warning"><i class="far fa-edit"></i></a>';
           $info_icon='<a href="'.route('employee.show',$each->id).'" class="text-primary"><i class="fas fa-info-circle"></i></a>';
           return '<div class="action-icon">'.$edit_icon.$info_icon.'</div>';
        })
        ->rawColumns(['is_present','action'])
        ->make(true);
    }
    public function create(){
        return view('employee.create');
        $departments=Department::orderBy('title')->get();
        return view('employee.create',compact('departments'));
    }

    public function store(StoreEmployee $request){
        $profile_img_name=null;
        if($request->hasFile('profile_img')){
            $profile_img_file=$request->file('profile_img');
            $profile_img_name=uniqid().'-'.time().'.'.$profile_img_file->getClientOriginalExtension();
            Storage::disk('public')->put('employee/'.$profile_img_name, file_get_contents($profile_img_file));
        }
        $employee =new User();
        $employee->employee_id=$request->employee_id;
        $employee->name=$request->name;
        $employee->phone=$request->phone;
        $employee->email=$request->email;
        $employee->nrc_number=$request->nrc_number;
        $employee->gender=$request->gender;
        $employee->birthday=$request->birthday;
        $employee->address=$request->address;
        $employee->department_id=$request->department_id;
        $employee->date_of_join=$request->date_of_join;
        $employee->is_present=$request->is_present;
        $employee->profile_img=$profile_img_name;
        $employee->password=Hash::make($request->password);
        $employee->save();
        return redirect()->route('employee.index')->with('create','Employee is successfully created!');

    }

    public function edit($id){
        $employee=User::findOrFail($id);
        $departments=Department::orderBy('title')->get();
        return view('employee.edit',compact('employee','departments'));
    }
    public function update($id,UpdateEmployee $request){
        $employee =User::findOrFail($id);
        $profile_img_name=$employee->profile_img;
        if($request->hasFile('profile_img')){
            Storage::disk('public')->delete('employee/'.$employee->profile_img);
            $profile_img_file=$request->file('profile_img');
            $profile_img_name=uniqid().'-'.time().'.'.$profile_img_file->getClientOriginalExtension();
            Storage::disk('public')->put('employee/'.$profile_img_name, file_get_contents($profile_img_file));
        }
        $employee->employee_id=$request->employee_id;
        $employee->name=$request->name;
        $employee->phone=$request->phone;
        $employee->email=$request->email;
        $employee->nrc_number=$request->nrc_number;
        $employee->gender=$request->gender;
        $employee->birthday=$request->birthday;
        $employee->address=$request->address;
        $employee->department_id=$request->department_id;
        $employee->date_of_join=$request->date_of_join;
        $employee->is_present=$request->is_present;
        $employee->profile_img=$profile_img_name;
        $employee->password=$request->password ? Hash::make($request->password) : $employee->password;
        $employee->update();
        return redirect()->route('employee.index')->with('create','Employee is successfully updated!');
    }
    public function show($id){
        $employee =User::findOrFail($id);
        return view('employee.show',compact('employee'));
    }
}
