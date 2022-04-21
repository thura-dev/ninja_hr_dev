<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRole;
use Yajra\Datatables\Datatables;
use App\Http\Requests\UpdateRole;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreEmployee;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateEmployee;
use App\Http\Requests\StoreDepartment;
use App\Http\Requests\UpdateDepartment;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        return view('role.index');
    }
    public function ssd()
    {
        $roles= Role::query();

        return Datatables::of($roles)

        ->addColumn('action',function($each){
            $edit_icon='<a href="'.route('role.edit',$each->id).'" class="text-warning"><i class="far fa-edit"></i></a>';
            $delete_icon='<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
            return '<div class="action-icon">'.$edit_icon.$delete_icon.'</div>';
         })

        ->addColumn('plus-icon',function($each){
            return null;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function create(){
        $permissions=Permission::all();
        return view('role.create',compact('permissions'));
    }
    public function store(StoreRole $request){
        $validated = $request->validated();
        $role =new Role();
        $role->name=$request->name;
        $role->save();
        return redirect()->route('role.index')->with('status','Role is successfully created!');

    }

    public function edit($id){
        $role=Role::findOrFail($id);
        return view('role.edit',compact('role'));
    }
    public function update($id,UpdateRole $request){
        $validated = $request->validated();
        $role=Role::findOrFail($id);
        $role->name=$request->name;
        $role->update();
        return redirect()->route('role.index')->with('status','Role is successfully updated!');
    }

    public function destroy($id){
        $role =Role::findOrFail($id);
        $role->delete();
        return 'success';
    }
}