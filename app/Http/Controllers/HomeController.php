<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

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
     * @return void
     */
    public function index()
    {
        if (Auth::user()->admin == 0) {
            Auth::logout();
            return redirect()->route('main');

        }

        return view('home');
    }
}
