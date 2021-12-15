<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Models\City;
use App\Models\Step;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:city_access', ['only' => ['index','show']]);
        $this->middleware('permission:city_create', ['only' => ['create','store']]);
        $this->middleware('permission:city_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:city_destroy', ['only' => ['destroy']]);
    }
    public function index()
    {
        $cities = City::latest()->paginate();
        return view("dashboard.cities.index",compact('cities'));
    }


    public function create()
    {
       return view("dashboard.cities.create");
    }


    public function store(CityStoreRequest $request)
    {
        try {

            $city = City::create([
                'city' => $request->name,
                'status' => $request->status,
            ]);
            toastr()->success("تم انشاء مدينة جديدة");
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
        $city = City::findOrFail($id);
        return view("dashboard.cities.edit", compact('city'));
    }


    public function update(CityUpdateRequest $request, $id)
    {
        try {
            $city =  City::findOrFail($id);
            $city->update([
                'city' => $request->name,
                'status' =>  $request->status
            ]);
            toastr()->info("تم تعديل معلومات المدينة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }// Start Update

    public function destroy($id)
    {
        //
    }
    public function steps($id) {

        $steps =  Step::where([
            ["status", 1],
            ['city_id', $id]
        ])->select(['id','name'])->get();

        return $steps;
    }
}
