<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StepStoreRequest;
use App\Models\City;
use App\Models\Group;
use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:step_access', ['only' => ['index','show']]);
        $this->middleware('permission:step_create', ['only' => ['create','store']]);
        $this->middleware('permission:step_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:step_destroy', ['only' => ['destroy']]);
    }
    public function index()
    {
        $steps = Step::with([
            'cityId' => function($q) {
                $q->select(['id','city']);
            }
        ])->latest()->get();
        return view("dashboard.steps.index" , compact('steps'));
    }  // End Index


    public function create()
    {
        $cities = City::where("status", 1)->select(['city' ,'id'])->get();

        return view("dashboard.steps.create", compact('cities'));
    }// End Create


    public function store(StepStoreRequest $request)
    {
        try {

            $step = Step::create([
                'name' => $request->name,
                'city_id' => $request->city,
                'status' => $request->status,
                'user_id' => auth()->user()->id,
            ]);
            toastr()->success("تم انشاء المرحلة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }// End Store


    public function show($id)
    {

    }// End Show


    public function edit($id)
    {
        $step = Step::findOrFail($id);
        $cities = City::where("status", 1)->select(['city' ,'id'])->get();
        return view("dashboard.steps.edit", compact('cities', 'step'));
    }// End Edit


    public function update(StepStoreRequest $request, $id)
    {
        try {
            $step = Step::findOrFail($id);
            $step->update([
                'name' => $request->name,
                'city_id' => $request->city,
                'status' => $request->status,
            ]);
            toastr()->info("تم تعديل المرحلة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }

    }// End Update


    public function destroy($id)
    {

    } // End Destroy

    public function groups($id) {
        $groups = Group::where([
            ['step_id' , $id],
            ['status' , 1]
        ])->select(['id','name'])->get();

        return $groups;
    }
}
