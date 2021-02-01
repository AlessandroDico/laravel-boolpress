<?php

// HOMECONTROLLER LATO ADMIN
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function generateToken()
    {
        $apiToken = Str::random(80);
        $user = Auth::user();
        $user->api_token = $apiToken;
        $user->save();

        return redirect()->route('admin.index');
    }
}
