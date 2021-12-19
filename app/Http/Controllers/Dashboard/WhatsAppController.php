<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    public function qrCode() {
        $methods = "https://api.ultramsg.com/" .auth()->user()->instance_id . "/instance/qr";
        $token = auth()->user()->token;
        return view("dashboard.whatsApp.qrCode" , compact('methods', 'token'));
    }
    public function connectedPhoneInfo() {
        $methods = "https://api.ultramsg.com/" .auth()->user()->instance_id . "/instance/me";
        $token = auth()->user()->token;
        return view("dashboard.whatsApp.connectedPhoneInfo", compact('methods', 'token'));
    }

    public function takeOver() {
        $methods = "https://api.ultramsg.com/" .auth()->user()->instance_id . "/instance/takeover";
        $token = auth()->user()->token;
        return view("dashboard.whatsApp.takeOver", compact('methods', 'token'));
    }
    public function logout() {
        $methods = "https://api.ultramsg.com/" .auth()->user()->instance_id . "/instance/logout";
        $token = auth()->user()->token;
        return view("dashboard.whatsApp.logout", compact('methods', 'token'));
    }
    public function clearQueue() {
        $methods = "https://api.ultramsg.com/" .auth()->user()->instance_id . "/messages/clear";
        $token = auth()->user()->token;
        return view("dashboard.whatsApp.clearQueue" , compact('methods', 'token'));
    }
    public function unsent() {
        $methods = "https://api.ultramsg.com/" .auth()->user()->instance_id . "/messages/clear";
        $token = auth()->user()->token;
        return view("dashboard.whatsApp.clearUnSent", compact('methods', 'token'));
    }

    public function setting() {
//        $response = Http::get('https://api.ultramsg.com/instance1447/instance/settings', [
//            'token' => 'jju48uohhs4rkkf9',
//        ]);
//
//        $data = !empty($response) ? $response : '';
        $methods = "https://api.ultramsg.com/" .auth()->user()->instance_id . "/instance/settings";
        $token = auth()->user()->token;
        return view("dashboard.whatsApp.setting", compact('methods', 'token'));
    }

}
