<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role_access', ['only' => ['index','show']]);
        $this->middleware('permission:role_create', ['only' => ['create','store']]);
        $this->middleware('permission:role_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role_destroy', ['only' => ['destroy']]);

    }
    public function index() {
        $roles = Role::latest()->paginate();
        return view("dashboard.roles.index", compact('roles'));
    }
    public function create() {
        $permissions = Permission::pluck('name', 'id')->all();

        return view("dashboard.roles.create", compact('permissions'));
    }

    public function store(Request $request) {


        try {
            $role =  Role::create([
               "name" => $request->name,
               'guard_name' => 'web'
            ]);
            $role->givePermissionTo([$request->permissions]);
            toastr()->success("تم انشاء الصلاحية بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }

    public function edit($id) {
        $permissions = Permission::pluck('name', 'id')->all();
        $roles = Role::with([
            'permissions' => function($query) {
                          $query->select(['id','name']);
        }])->where("name" ,"!=",'Super Admin')->findOrFail($id);

//        return $roles->permissions;
        return view("dashboard.roles.edit", compact('permissions','roles'));
    }

    public function update(Request $request,$id) {
        DB::beginTransaction();
        try{
        $role = Role::with([
            'permissions' => function($query) {
                $query->select(['id','name']);
            }])->where("name" ,"!=",'Super Admin')->findOrFail($id);

        foreach($role->permissions  as $permission) {
            $role->revokePermissionTo($permission->name);

        }
        $role->givePermissionTo([$request->permissions]);
            DB::commit();
            toastr()->success("تم تعديل الصلاحية  بنجاح");
            return redirect()->back();
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }
    public function destroy($id) {
        DB::beginTransaction();
        try{
            $role = Role::with([
                'permissions' => function($query) {
                    $query->select(['id','name']);
                }])->where("name" ,"!=",'Super Admin')->findOrFail($id);

            foreach($role->permissions  as $permission) {
                $role->revokePermissionTo($permission->name);

            }
            $role->delete();
            DB::commit();
            toastr()->error("تم حذف الصلاحية  بنجاح");
            return redirect()->back();
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }
}
