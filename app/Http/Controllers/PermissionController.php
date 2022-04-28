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
use App\Http\Requests\StorePermission;
use App\Http\Requests\UpdateDepartment;
use App\Http\Requests\UpdatePermission;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        return view('permission.index');
    }
    public function ssd()
    {
        $permissions= Permission::query();

        return Datatables::of($permissions)

        ->addColumn('action',function($each){
            $edit_icon='<a href="'.route('permission.edit',$each->id).'" class="text-warning"><i class="far fa-edit"></i></a>';
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

        return view('permission.create');
    }
    public function store(StorePermission $request){
        $validated = $request->validated();
        $permissions =new Permission();
        $permissions->name=$request->name;
        $permissions->save();
        return redirect()->route('permission.index')->with('status','Permission is successfully created!');

    }

    public function edit($id){
        $permissions=Permission::findOrFail($id);
        return view('permission.edit',compact('permissions'));
    }
    public function update($id,UpdatePermission $request){
        // $validate =$request->validator();
        $permissions=Permission::findOrFail($id);
        $permissions->name=$request->name;
        $permissions->update();
        return redirect()->route('permission.index')->with('status','Permission is successfully updated!');
    }

    public function destroy($id){
        $permissions =Permission::findOrFail($id);
        $permissions->delete();
        return 'success';
    }

}
