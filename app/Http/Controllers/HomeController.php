<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Academia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->DNI == '74415678') {
            return view('DBA.homeDBA');
        } else {
            if (Academia::where('DNI', Auth::user()->DNI)->exists()) {
                return view('Academia.homeAcademia');
            } else {
                echo "pajero";
            }
        }
    }
}
