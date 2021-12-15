<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user_access', ['only' => ['index','show']]);
        $this->middleware('permission:user_create', ['only' => ['create','store']]);
        $this->middleware('permission:user_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user_destroy', ['only' => ['destroy']]);
    }
    public function index()
    {
//        where("id" , '!=' , auth()->user()->id)->
        $users =  User::latest()->paginate();
        return view("dashboard.users.index", compact('users'));
    }// End Index


    public function create()
    {
        $roles = Role::select(['id', 'name'])->get();
        return view("dashboard.users.create", compact('roles'));
    }// End Create


    public function store(UserStoreRequest $request)
    {
        try {
            $user =  User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => $request->status,
            ]);
            $user->assignRole($request->role);
            toastr()->success("تم انشاء المستخدم بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }//End Store


    public function show($id)
    {

    } // End Show


    public function edit($id)
    {
        $user = User::findOrfail($id);
        $rs = Role::select(['id', 'name'])->get();
        $userRole = $user->roles->first();
        return view("dashboard.users.edit", compact('user','rs','userRole'));
    } // End Edit


    public function update(UserUpdateRequest $request, $id )
    {

        try {
            $user =  User::findOrFail($id);
            $user->update([
                'email' => $request->email,
                'name' => $request->name,
                'password' => !empty($request->password) ? bcrypt($request->password) : $user->password ,
                'status' => $request->status,
            ]);
            $user->syncRoles([$request->role]);
            toastr()->info("تم التعديل بيانات المستخدم بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    } // End Update


    public function destroy($id)
    {

    } //  End Destroy
}
