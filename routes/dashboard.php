<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("dashboard/login", 'AuthDashboardController@login')->name('dashboard.login');
Route::post("dashboard/login", 'AuthDashboardController@loginProcess')->name('dashboard.login');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth:web','activeAuth:web'])->group(function(){
        Route::post("logout", 'AuthDashboardController@logout')->name('logout');

        Route::get("/index","HomeController@index")->name("index");

        // Employees Route
        Route::resource("user", 'UserController');

        // City Route
        Route::resource("city", 'CityController')->except(['show','destroy']);
        Route::get("city/steps/{id}" ,'CityController@steps')->name("city.steps");

        // Step Route
        Route::resource("step", 'StepController')->except(['show','destroy']);
        Route::get("step/group/{id}", 'StepController@groups')->name("step.group");

        // Group Route
        Route::resource("group", 'GroupController')->except(['show','destroy']);

        //Role Route
        Route::resource("role", 'RoleController');
        Route::resource("feedback", 'FeedbackController');
        Route::resource("ads", 'AdsController');

        // Apartment Route
        Route::get("apartment/index" , 'ApartmentController@index')->name("apartment.index");
        Route::get("apartment/changeTextType" , 'ApartmentController@changeTextType')->name("apartment.changeTextType");
        Route::get("apartment/mine" , 'ApartmentController@mine')->name("apartment.mine");
        Route::get("apartment/search" , 'ApartmentController@search')->name("apartment.search");
        Route::get("apartment/create" , 'ApartmentController@create')->name("apartment.create");
        Route::post("apartment/store" , 'ApartmentController@store')->name("apartment.store");
        Route::get("apartment/show/{id}" , 'ApartmentController@show')->name("apartment.show");
        Route::delete("apartment/destroy/{id}" , 'ApartmentController@destroy')->name("apartment.destroy");
        Route::delete("apartment/destroyImage/{id}" , 'ApartmentController@destroyImage')->name("apartment.destroyImage");
        Route::get("apartment/mediators","ApartmentController@mediators")->name("apartment.mediators");
        Route::get("apartment/owners","ApartmentController@owners")->name("apartment.owners");
        Route::get("apartment/sell",'ApartmentController@sell')->name("apartment.sell");
        Route::get("apartment/rent",'ApartmentController@rent')->name("apartment.rent");
        Route::get("apartment/rent_w_furniture",'ApartmentController@rent_w_furniture')->name("apartment.rent_w_furniture");
        Route::get('apartment/whatsApp/{id}' , "ApartmentController@whatsApp")->name("apartment.whatsApp");
        Route::post('apartment/sendWhatsApp/{id}' , "ApartmentController@sendWhatsApp")->name("apartment.sendWhatsApp");
        Route::get("apartment/edit/{id}",'ApartmentController@edit')->name("apartment.edit");
        Route::put("apartment/update/{id}",'ApartmentController@update')->name("apartment.update");
        Route::get("apartment/owner/edit/{id}",'ApartmentController@ownerEdit')->name("apartment.owner.edit");
        Route::put("apartment/owner/update/{id}",'ApartmentController@ownerUpdate')->name("apartment.owner.update");
        Route::get("apartment/mediator/edit/{id}",'ApartmentController@mediatorEdit')->name("apartment.mediator.edit");
        Route::put("apartment/mediator/update/{id}",'ApartmentController@mediatorUpdate')->name("apartment.mediator.update");
        Route::get("apartment/sell/edit/{id}",'ApartmentController@sellEdit')->name("apartment.sell.edit");
        Route::put("apartment/sell/update/{id}",'ApartmentController@sellUpdate')->name("apartment.sell.update");
        Route::get("apartment/rent/edit/{id}",'ApartmentController@rentEdit')->name("apartment.rent.edit");
        Route::put("apartment/rent/update/{id}",'ApartmentController@rentUpdate')->name("apartment.rent.update");
        Route::get("apartment/destroySession",'ApartmentController@destroySession')->name("apartment.destroySessions");

        //Whats App Setting
        Route::get("whatsApp/qrCode", 'WhatsAppController@qrCode')->name("whatsApp.qrCode");
        Route::get("whatsApp/connectedPhoneInfo", 'WhatsAppController@connectedPhoneInfo')->name("whatsApp.connectedPhoneInfo");
        Route::get("whatsApp/takeOver", 'WhatsAppController@takeOver')->name("whatsApp.takeOver");
        Route::get("whatsApp/logout", 'WhatsAppController@logout')->name("whatsApp.logout");
        Route::get("whatsApp/clearQueue", 'WhatsAppController@clearQueue')->name("whatsApp.clearQueue");
        Route::get("whatsApp/Unsent", 'WhatsAppController@Unsent')->name("whatsApp.Unsent");
        Route::get("whatsApp/setting", 'WhatsAppController@setting')->name("whatsApp.setting");

    }); // Dashboard And Middleware Auth Web
}); // End Of Localizations
