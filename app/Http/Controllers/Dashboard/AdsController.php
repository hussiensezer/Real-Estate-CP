<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdsStoreRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view("dashboard.ads.create");
    }


    public function store(Request $request)
    {


//        $contacts = ['01095454494','01151251902','01095472854'];
//        $contacts = Contact::select(['phone'])->where('phone','!=' ,'')->inRandomOrder()->limit(2000)->get();

        try {
            $contacts = Contact::select(['id','phone'])->where('phone','!=' ,'')->whereBetween('id',[$request->ppl_start, $request->ppl_end])->get();
            foreach($contacts as $contact) {
                $response = Http::post('https://api.ultramsg.com/'. auth()->user()->instance_id .'/messages/chat', [
                    'token' => auth()->user()->token,
                    'to' =>  '+2' . $contact->phone,
                    "priority" => 10,
                    "body" =>$request->message,
                ]);
            }


            toastr()->success("تم ارسال الاعلان بنجاح");
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
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
