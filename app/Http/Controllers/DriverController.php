<?php

namespace App\Http\Controllers;

use App\Drivers;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $drivers = Drivers::all();

        return view('driver', [
            'drivers' => $drivers
        ]);
    }
}
