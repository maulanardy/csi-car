<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\Drivers;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $tasks   = Tasks::whereDate('task_date_start', '>=', date('Y-m-d'))->orderBy("task_date_start", "asc")->get();
        $drivers  = Drivers::get();
        $display = [];

        foreach ($drivers as $key => $driver) {
            $obj         = new \stdClass();
            $obj->driver = $driver->name;
            $obj->tasks  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_started == 1 && $val->is_finished == 0;
            });
            $obj->tasks_done  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_finished == 1;
            })->sortByDesc("started_date")->take(1);
            $obj->tasks_pending  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_started == 0;
            });

            $display[] = $obj;
        }

        return view('home', [
            'display' => $display,
        ]);
    }

    public function display()
    {
        $tasks   = Tasks::whereDate('task_date_start', '>=', date('Y-m-d'))->orderBy("task_date_start", "asc")->get();
        $drivers  = Drivers::get();
        $display = [];

        foreach ($drivers as $key => $driver) {
            $obj         = new \stdClass();
            $obj->driver = $driver->name;
            $obj->tasks  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_started == 1 && $val->is_finished == 0;
            });
            $obj->tasks_done  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_finished == 1;
            })->sortByDesc("started_date")->take(1);
            $obj->tasks_pending  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_started == 0;
            });

            $display[] = $obj;
        }

        return view('display', [
            'display' => $display,
        ]);
    }
}
