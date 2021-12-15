<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

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
        }])->findOrFail($id);

//        return $roles->permissions;
        return view("dashboard.roles.edit", compact('permissions','roles'));
    }
}
