<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentStoreRequest;
use App\Models\Apartment;
use App\Models\Attachment;
use App\Models\City;
use App\Models\Group;
use App\Models\Mediator;
use App\Models\Owner;
use App\Models\Rent;
use App\Models\SellApartment;
use App\Models\Step;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Traits\GeneralTrait;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ApartmentController extends Controller
{
    use GeneralTrait, ImageTrait;

    public function __construct()
    {
        $this->middleware('permission:apartment_access', ['only' => ['index','show']]);
        $this->middleware('permission:apartment_create', ['only' => ['create','store']]);
        $this->middleware('permission:apartment_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:apartment_destroy', ['only' => ['destroy']]);
        $this->middleware('permission:apartment_whatsApp', ['only' => ['whatsApp']]);
    }
    public function index()
    {
        $apartments =  Apartment::with([
            'cityId','stepId','groupId','userId'
        ])->withCount(["images", 'sell','rent','media','owner','mediator'])->latest()->paginate(20)->withQueryString();

        return view("dashboard.apartment.index", compact('apartments'));
    } // End Index


    public function create()
    {
        $cities = City::select(['id','city'])->where("status" , 1)->get();
        $numbers = 100;
        $users =  User::where("status", 1)->select(['id', 'name'])->get();
        return view("dashboard.apartment.create",compact('cities','numbers', 'users'));
    } // End Create


    public function store(ApartmentStoreRequest $request)
    {

        DB::beginTransaction();


      try{
          $randomSerialNumber = '';
          $money = '';
          if($request->apartment_type == 'sell') {
              $randomSerialNumber =  "S". random_int(100, 1000);
              $money = $request->apartment_price;
          }elseif($request->apartment_type == 'rent') {
              $randomSerialNumber =  "R". random_int(100, 1000);
              $money = $request->rent_value;
          }elseif($request->apartment_type == 'rent_w_furniture') {
             $randomSerialNumber =  "RF". random_int(100, 1000);
              $money = $request->rent_value;
          }
          $apartment = Apartment::create([
            "city_id" => $request->city,
            "step_id" => $request->step,
            "group_id" => $request->group,
            "user_id" => auth()->user()->id,
            'no_building' => $request->building,
            "floor" => $request->floor,
            'no_apartment' => $request->apartment_no,
            "view" => $request->view,
            "directions" => $request->directions,
            'apartment_space' =>$request->apartment_space,
            'total_rooms' => $request->total_rooms,
            'total_bathroom' => $request->total_bathroom,
            'garden_space' =>$request->garden,
            'serial_no' => $randomSerialNumber,
            'gas' => $request->gas,
            'water' => $request->water,
            'Electric' =>$request->electric,
            'telephone' => $request->telephone,
            'apartment_type' => $request->apartment_type,
            'decoration' => $request->decoration,
            'photos' => $request->hasFile('images') ? 1 : 0,
            'videos' => $request->hasFile('videos') ? 1 : 0,
            'comments' => $request->apartment_comment,
            'money' => $money,
            'available' => 1,
            'complete' => $request->complete,
          ]);
          switch ($request->apartment_type) {
             case ('sell'):
                  $sell =  new SellApartment();
                  $sell->apartment_price = $request->apartment_price;
                  $sell->total_installments = $request->total_installments;
                  $apartment->sell()->save($sell);
             break;
                // End Case
             case ("rent_w_furniture"):
             case('rent'):
                 $rent = new Rent();
                 $rent->rent_insurance = $request->rent_insurance;
                 $rent->rent_value = $request->rent_value;
                 $rent->duration_contract = $request->duration_contract;
                 $rent->annual_expenses = $request->annual_expenses;
                 $apartment->rent()->save($rent);
             break;
          }// End Switch For apartment_type

          switch ($request->personal_type) {
            case('owners'):
                $owner = new Owner();
                $owner->name = $request->owner_name;
                $owner->phone =  $request->owner_phone;
                $owner->other_phone =  $request->owner_other_phone;
                $owner->comment =  $request->owner_comment;
                $apartment->owner()->save($owner);
            break;
              case('mediators'):
                $mediators = new Mediator();
                $mediators->name = $request->mediators_name;
                $mediators->title = $request->mediators_title;
                $mediators->phone = $request->mediators_phone;
                $mediators->other_phone = $request->mediators_other_phone;
                $mediators->comment = $request->mediators_comment;
                $apartment->mediator()->save($mediators);
              break;
          }// End Switch Personal Type
            if($request->hasFile('images')) {
                  foreach ($request->images as $image) {
                      $attachment =  new Attachment();
                      $attachment->path = $this->imageStore($image,"gallery",'images' );
                      $attachment->type = 'image';
                      $apartment->images()->save($attachment);

                  }// End Foreach
            }// End If
            if($request->hasFile('videos')) {
                foreach ($request->videos as $video){
                    $attachment = new Attachment();
                    $attachment->path = $this->imageStore($video,"gallery",'videos' );
                    $attachment->type = 'video';
                    $apartment->images()->save($attachment);
                }// End Foreach
            }// End If
          DB::commit();

          return $this->returnSuccessMessage('Created Successfully');
      }
      catch (\Exception $e) {
          DB::rollback();
          return $this->returnError('412','Sorry Something Wrong Or Not Found...  ' . $e);
      }
    }// End Store


    public function show($id)
    {
        $apartment = Apartment::with([
            'cityId','stepId','groupId','userId','sell','rent','owner','mediator','images','media','feedback.user'
        ])->withCount(["images", 'sell','rent','media','owner','mediator','feedback'])->findOrFail($id);
        return view("dashboard.apartment.show" , compact('apartment'));
    }// End Show


    public function edit($id)
    {
        $apartment =  Apartment::findOrFail($id);
        $cities =  City::latest()->get();
        $steps = Step::select(['id', 'name', 'city_id'])->where("city_id" , $apartment->city_id)->get();
        $groups= Group::select(['id', 'name', 'step_id'])->where('step_id' , $apartment->step_id)->get();
        $numbers = 100;
//        return $groups;
        return view("dashboard.apartment.edit" , compact("apartment",'cities','numbers','steps','groups'));
    }// End Edit


    public function update(Request $request, $id)
    {


        try{

            $apartment = Apartment::with(['images','media'])->findOrFail($id);
            $apartment->update([
                "city_id" => $request->city,
                "step_id" => $request->step,
                "group_id" => $request->group,
                'no_building' => $request->building,
                "floor" => $request->floor,
                'no_apartment' => $request->apartment_no,
                "view" => $request->view,
                "directions" => $request->directions,
                'apartment_space' =>$request->apartment_space,
                'total_rooms' => $request->total_rooms,
                'total_bathroom' => $request->total_bathroom,
                'garden_space' =>$request->garden,
                'decoration' =>$request->decoration,
                'gas' => $request->gas,
                'water' => $request->water,
                'Electric' =>$request->electric,
                'telephone' => $request->telephone,
                'photos' => $request->hasFile('images') ? 1 : 0,
                'videos' => $request->hasFile('videos') ? 1 : 0,
                'comments' => $request->comments,
                'available' => $request->status,
                'complete' => $request->complete,
             ]);
            if($request->hasFile("images")) {
                foreach ($apartment->images as $image) {
                    $this->imageDestroy("gallery",'images' ,$image->path);
                }

                foreach ($request->images as $image) {
                    $addImages =  Attachment::create([
                        'path' => $this->imageStore($image,"gallery",'images'),
                        'type' => 'image',
                        'status' => 1,
                        'apartment_id' => $apartment->id,
                    ]);
                }// End Foreach

            }
            toastr()->info("تم تعديل معلومات الوحدة بنجاح");
            return redirect()->back();
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }// End Update


    public function destroy($id)
    {
        DB::beginTransaction();
        try{
        $apartment = Apartment::findOrFail($id);
        foreach ($apartment->images  as $img) {
            $this->imageDestroy("gallery",'images' ,$img->path);
            $img = Attachment::destroy($img->id);
        }

        $mediator =  Mediator::where("apartment_id" , $apartment->id)->first() ;
        if(!empty($mediator)) {
            $mediator->delete();
        }

        $owner = Owner::where("apartment_id" , $apartment->id)->first();
         if(!empty($owner)) {
            $owner->delete();
        }
         $rent = Rent::where("apartment_id" , $apartment->id)->first();
        if(!empty($rent)) {
            $rent->delete();
        }
        $sell =  SellApartment::where('apartment_id', $apartment->id)->first();
        if(!empty($sell)) {
            $sell->delete();
        }
        $apartment->delete();

            DB::commit();
            toastr()->warning("تم حذف الوحدة بنجاح");
            return redirect()->back();

        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }// End Destroy
    public function owners() {
      return view("dashboard.apartment.type.owners");
    }
    public function mediators() {
        return view("dashboard.apartment.type.mediators");
    }
    public function sell() {
        return view("dashboard.apartment.apartment_type.sell");
    }
    public function rent() {
        return view("dashboard.apartment.apartment_type.rent");
    }
    public function rent_w_furniture() {
        return view("dashboard.apartment.apartment_type.rent_w_furniture");
    }
    public function whatsApp($id) {

        $apartment = Apartment::select(['id'])->findOrfail($id);
        return view("dashboard.apartment.whatApp",compact('apartment'));
    }
    public function sendWhatsApp(Request $request,$id) {

        DB::beginTransaction();
        try{
        $apartment = Apartment::with(['images', 'cityId','stepId'])->findOrfail($id);

        $totalRooms =  "عدد الغرف" . $apartment->total_rooms ;
        $totalBathrooms = " عدد الحمامات  " . $apartment->total_bathroom ;
        $apartmentSpace = " مساحة الشقة ". $apartment->apartment_space;
        $shortCode  = "  كود الوحدة ". $apartment->serial_no;
        $floor =  " الدور " . __("global.floor_".$apartment->floor);
//        $view =   " الاطلالة " . trans('global.' . $apartment->view);
        $directions = $apartment->directions != NULL && $request->directions == 1 ? " الاتجاة " . trans('global.' . $apartment->directions) : '' ;
        $apartmentType = " حالة الوحدة " . trans('global.' . $apartment->apartment_type);
        $step = "  المرحلة " . $apartment->stepId->name;
        $city = "  المدينة " . $apartment->cityId->city;
        $number =  "  للاستفسار ". "01004498583";
        $body =
            $apartmentType . '
            '.
            $city . '
            '
            . $apartmentSpace . '
            '
            . $totalRooms . '
            '
            . $totalBathrooms . '
            '
            . $floor . '
            '
//            . $view . '
//            '
            . $directions .'
            '
            . $shortCode . '
            
            '. $number . '
            '
        ;
        return $body;
        $response = Http::post('https://api.ultramsg.com/'. auth()->user()->instance_id .'/messages/chat', [
            'token' => auth()->user()->token,
            'to' =>  '+2' . $request->phone,
            "priority" => 10,
            "body" =>$body,
        ]);
//        $imageArray = ['https://compuavision.com/cp/public/gallery/images/af6ddbd45111421267b7d9850b0f794e.jpg',
//          "https://compuavision.com/cp/public/gallery/images/6628553b358586ab0ba31e5b68c02f20.jpg",
//            'https://compuavision.com/cp/public/gallery/images/2af0aef08bc3cc10bd807562560c3dbe.jpg'
//        ];


//        foreach ($imageArray as $img) {
//            $images =  Http::post('https://api.ultramsg.com/'. auth()->user()->instance_id .'/messages/image', [
//                'token' => auth()->user()->token,
//                'to' =>  '+2' . $request->phone,
////                "image" =>"https://compuavision.com/cp/public/gallery/images/" .$img->path,
//                "image" => $img,
//                'caption' => 'Testing'
//            ]);
//        }

            foreach ($apartment->images as $img) {
                $images =  Http::post('https://api.ultramsg.com/'. auth()->user()->instance_id .'/messages/image', [
                    'token' => auth()->user()->token,
                    'to' =>  '+2' . $request->phone,
                    "image" =>"https://compuavision.com/cp/public/gallery/images/" .$img->path,
                    'caption' => 'Testing'
                ]);
            }
            DB::commit();
            toastr()->info(" تم ارسال بيانات الوحدة");
            return redirect()->back();
    }catch (\Exception $e) {
            DB::rollback();
            return $this->returnError('412','Sorry Something Wrong Or Not Found...  ' . $e);
        }
    }// End Send Whats App Message

    public function ownerEdit($id) {
        $owner =  Owner::where("apartment_id", $id)->firstOrFail();
        return view("dashboard.apartment.ownerEdit",compact('owner'));
    }
    public function ownerUpdate(Request $request,$id) {

        try{
            $owner =  Owner::findOrFail($id);

            $owner->update([
                'name' =>  $request->owner_name,
                'phone' => $request->owner_phone,
                'other_phone' => $request->owner_other_phone,
                'comment' =>  $request->owner_comment,
            ]);

            toastr()->info("تم تعديل معلومات المالك بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }

    public function mediatorEdit($id) {
        $mediator =  Mediator::where("apartment_id", $id)->firstOrFail();
        return view("dashboard.apartment.mediatorsEdit",compact('mediator'));
    }

    public function mediatorUpdate(Request $request, $id) {

        try{
            $mediator =  Mediator::findOrFail($id);

            $mediator->update([
                'name' => $request->mediators_name,
                'title' => $request->mediators_title,
                'phone' => $request->mediators_phone,
                'other_phone' => $request->mediators_other_phone,
                'comment'  => $request->mediators_comment
            ]);

            toastr()->info("تم تعديل معلومات المالك بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }
    public function sellEdit($id) {
        $sell =  SellApartment::where("apartment_id", $id)->firstOrFail();

        return view("dashboard.apartment.sellEdit",compact('sell'));
    }

    public function sellUpdate(Request $request,$id) {
        DB::beginTransaction();
        try{
            $sell =  SellApartment::findOrFail($id);
            $apartment = Apartment::findOrFail($sell->apartment_id);

            $sell->update([
                'apartment_price' => $request->apartment_price,
                'total_installments' =>  $request->total_installments,
            ]);
            $apartment->update([
                "money" => $request->apartment_price
            ]);
            DB::commit();
            toastr()->info("تم تعديل معلومات بيع الوحدة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }

    public function rentEdit($id) {
        $rent =  Rent::where("apartment_id", $id)->firstOrFail();

        return view("dashboard.apartment.rentEdit",compact('rent'));
    }

    public function rentUpdate(Request $request,$id) {
        DB::beginTransaction();
        try{
            $rent =  Rent::findOrFail($id);
            $apartment = Apartment::findOrFail($rent->apartment_id);

            $rent->update([
                'rent_insurance' => $request->rent_insurance,
                'rent_value' =>$request->rent_value,
                'duration_contract' => $request->duration_contract,
                'annual_expenses' => $request->annual_expenses,
            ]);
            $apartment->update([
                "money" => $request->rent_value,
            ]);
            DB::commit();
            toastr()->info("تم تعديل معلومات ايجار الوحدة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }// End Rent Update


    public function mine()
    {
        $apartments =  Apartment::where('user_id', auth()->user()->id)->with([
            'cityId','stepId','groupId','userId'
        ])->withCount(["images", 'sell','rent','media','owner','mediator'])->latest()->paginate(20);

        return view("dashboard.apartment.mine", compact('apartments'));
    } // End Index

    public function search(Request $request) {
        $cities =  City::where("status" , 1)->get();
        $numbers = 100;
         $query = DB::table('apartments')->where('available','=',1)
             ->join('users', 'apartments.user_id','=','users.id')
             ->join("cities", 'apartments.city_id', '=', 'cities.id')
             ->join('steps', 'apartments.step_id', '=','steps.id')
             ->join('groups', 'apartments.group_id', '=', 'groups.id')
             ->select("users.name AS userName",'cities.city AS cityName','steps.name AS stepName','groups.name AS groupName','apartments.*');

         if(isset($request->serial) && !empty($request->serial)) {
             $query->where("serial_no",'=',$request->serial);
         }
         if(isset($request->apartment_type) && !empty($request->apartment_type)) {
             $query->where("apartment_type", '=' , $request->apartment_type);
         }
         if(isset($request->city) && !empty($request->city)) {
             $query->where("apartments.city_id", '=' , $request->city);
         }
         if(isset($request->step) && !empty($request->step)) {
             $query->whereIn('apartments.step_id', $request->step);
         }
         if(isset($request->group) && !empty($request->group)) {
             $query->where('apartments.group_id', $request->group);
         }
         if(isset($request->building) && !empty($request->building)) {
             $query->where('apartments.no_building', $request->building);
         }
         if(isset($request->floor)  && $request->floor >= 0) {
             $query->where('apartments.floor', $request->floor);
         }
         if(isset($request->apartment_no) && !empty($request->apartment_no)) {
             $query->where('apartments.no_apartment', $request->apartment_no);
         }
        if(isset($request->view) && !empty($request->view)) {
            $query->where('apartments.view', $request->view);
        }
        if(isset($request->directions) && !empty($request->directions)) {
            $query->where('apartments.directions', $request->directions);
        }
        if(isset($request->apartment_space_from)&& !empty($request->apartment_space_from) && isset($request->apartment_space_to) && !empty($request->apartment_space_to)) {
            $query->whereBetween('apartments.apartment_space', [$request->apartment_space_from, $request->apartment_space_to]);
        }
        if(isset($request->total_rooms) && !empty($request->total_rooms)) {
            $query->where('apartments.total_rooms', $request->total_rooms);
        }
        if( isset($request->total_bathroom) && !empty($request->total_bathroom)) {
            $query->where('apartments.total_bathroom', $request->total_bathroom);
        }
        if(isset($request->garden) && $request->garden == 0) {
            $query->where('apartments.garden_space','=',0);
        }elseif(isset($request->garden) && !empty($request->garden )) {
            $query->where('apartments.garden_space','>',0);
        }
        if(isset($request->decoration) && !empty($request->decoration)) {
            $query->where("apartments.decoration",$request->decoration);
        }
        if(isset($request->moneyStart) && !empty($request->moneyStart) && isset($request->moneyEnd) && !empty($request->moneyEnd)) {
            $query->whereBetween("apartments.money",[$request->moneyStart, $request->moneyEnd]);
        }
         $apartments =  $query->latest()->paginate(20)->withQueryString();

//         return $request->apartment_space_from;
        return view("dashboard.apartment.search",compact('apartments','cities','numbers'));
    }
    public function destroySession(Request $request){
        Session::forget($request->all());
        $cities =  City::where("status" , 1)->get();
        $apartments = [];
        $numbers = 100;
        return view("dashboard.apartment.search",compact('cities', 'numbers','apartments'));
    }
    public function changeTextType() {
            return view("dashboard.apartment.z8rafa");
    }

    public function destroyImage($id) {

        try{
            $img = Attachment::findOrFail($id);
            $this->imageDestroy("gallery",'images' ,$img->path);
            $img = Attachment::destroy($img->id);
            toastr()->warning("تم حذف الصورة بنجاح");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }
    public function notComplete()
    {
        $apartments =  Apartment::where('complete', '0')->with([
            'cityId','stepId','groupId','userId'
        ])->withCount(["images", 'sell','rent','media','owner','mediator'])->latest()->paginate(20)->withQueryString();

        return view("dashboard.apartment.notComplete", compact('apartments'));
    } // End Index

}
