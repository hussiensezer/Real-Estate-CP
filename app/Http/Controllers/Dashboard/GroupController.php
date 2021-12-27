<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Models\City;
use App\Models\Group;
use App\Models\Step;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:group_access', ['only' => ['index','show']]);
        $this->middleware('permission:group_create', ['only' => ['create','store']]);
        $this->middleware('permission:group_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:group_destroy', ['only' => ['destroy']]);
    }
    public function index()
    {
        $groups = Group::with(['cityId','stepId'])->latest()->get();

        return view("dashboard.groups.index", compact('groups'));
    }


    public function create()
    {
        $cities =  City::where("status", 1)->latest()->get();
        $steps =  Step::where("status", 1)->latest()->get();
        return view("dashboard.groups.create",compact('cities','steps'));
    }


    public function store(GroupStoreRequest $request)
    {
        try {
            $group = Group::create([
                'name' => $request->name,
                'city_id' => $request->city,
                'step_id' => $request->step,
                'user_id' => auth()->user()->id,
                'status' => $request->status,
            ]);
            toastr()->success("تم انشاء المجموعة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $group = Group::findOrFail($id);
        $cities =  City::latest()->get();
        $steps = Step::where('city_id', $group->city_id)->latest()->get();
         return view("dashboard.groups.edit", compact('group', 'cities', 'steps'));
    }


    public function update(GroupUpdateRequest $request, $id)
    {

        try {
            $group =  Group::findOrFail($id);
            $group->update([
                "name" => $request->name,
                'city_id' =>  $request->city,
                'step_id' =>  $request->step,
                'status' => $request->status,
            ]);

            toastr()->info("تم تعديل بيانات المرحلة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }


    public function destroy($id)
    {
        //
    }
}
