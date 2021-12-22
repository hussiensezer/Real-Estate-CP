<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Feedback;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index() {

       $todayApartment = Apartment::where("created_at",">=", Carbon::today())->count();
       $apartment = Apartment::where("available","=", 1)->count();
       $todayFeedback =  Feedback::where("created_at" , '>=' , Carbon::today())->count();
       $feedback =  Feedback::count();
       $activeEmployee = User::where("status" , 1)->count();
       $deactivatedEmployee = User::where("status" , 0)->count();


       return view("dashboard.index", compact('todayApartment', 'apartment', 'todayFeedback','feedback','activeEmployee','deactivatedEmployee'));
   }
}
