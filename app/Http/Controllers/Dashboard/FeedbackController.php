<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackStoreRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function index()
    {
        $feedback = Feedback::with('user')->latest()->paginate();
//        return $feedback;
        return view("dashboard.feedback.index", compact('feedback'));
    }


    public function create()
    {
      return view("dashboard.feedback.create");
    }


    public function store(FeedbackStoreRequest $request)
    {
        try {

            $feedback = Feedback::create([
                'client_name' =>$request->name ,
                'client_number' => $request->phone,
                'apartment_code' =>$request->apartment_code ,
                'user_id' => auth()->user()->id,
                'description' => $request->description,
                'other_feedback' => $request->other_feedback,
            ]);
            toastr()->success("تم انشاء المعاينة بنجاح");
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
        $feedback =  Feedback::findOrFail($id);
        return view("dashboard.feedback.edit", compact('feedback'));
    }


    public function update(FeedbackStoreRequest $request, $id)
    {
        try {
            $feedback =  Feedback::findOrFail($id);
            $feedback->update([
                'client_name' =>$request->name ,
                'client_number' => $request->phone,
                'apartment_code' =>$request->apartment_code ,
                'description' => $request->description,
                'other_feedback' => $request->other_feedback,
            ]);
            toastr()->info("تم تعديل المعاينة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }


    public function destroy($id)
    {
        try {
            $feedback =  Feedback::findOrFail($id)->delete();
            toastr()->error("تم حذف المعاينة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }
}
