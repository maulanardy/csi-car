<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\Drivers;
use App\Cars;
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
        $drivers  = Drivers::where("is_active", 1)->get();
        $display = [];

        foreach ($drivers as $key => $driver) {
            $obj         = new \stdClass();
            $obj->driver = $driver->name;
            $obj->car    = $driver->car;
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

    public function index2()
    {
        $tasks   = Tasks::whereDate('task_date_start', '>=', date('Y-m-d'))->orderBy("task_date_start", "asc")->get();
        $drivers  = Drivers::where("is_active", 1)->get();

        $display = [];

        foreach ($drivers as $key => $driver) {
            //pindahkan tanpa supir ke terakhir
            if($driver->name == "Tanpa Supir") {
                unset($drivers[$key]);
                $drivers[] = $driver;
            }
        }

        foreach ($drivers as $key => $driver) {
            $tasksUndone = Tasks::where('driver_id', $driver->id)->whereDate('task_date_start', '<', date('Y-m-d'))->where('is_draft', 0)->where('is_started', 1)->where('is_finished', 0)->orderBy("task_date_start", "asc")->get();
            
            $obj         = new \stdClass();
            $obj->driver = $driver;
            $obj->car    = $driver->car;
            $obj->tasks  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_started == 1 && $val->is_finished == 0;
            });

            foreach ($tasksUndone as $tu) {
                $obj->tasks[] = $tu;
            }

            $obj->tasks_done  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_finished == 1;
            })->sortByDesc("started_date");
            $obj->tasks_pending  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_started == 0;
            });

            $display[] = $obj;
        }

        return view('home2', [
            'display' => $display,
        ]);
    }

    public function display()
    {
        $tasks   = Tasks::whereDate('task_date_start', '>=', date('Y-m-d'))->orderBy("task_date_start", "asc")->get();
        $drivers  = Drivers::where("is_active", 1)->get();
        $display = [];

        foreach ($drivers as $key => $driver) {
            //pindahkan tanpa supir ke terakhir
            if($driver->name == "Tanpa Supir") {
                unset($drivers[$key]);
                $drivers[] = $driver;
            }
        }

        foreach ($drivers as $key => $driver) {
            $tasksUndone = Tasks::where('driver_id', $driver->id)->whereDate('task_date_start', '<', date('Y-m-d'))->where('is_draft', 0)->where('is_started', 1)->where('is_finished', 0)->orderBy("task_date_start", "asc")->get();
            
            $obj         = new \stdClass();
            $obj->driver = $driver;
            $obj->car    = $driver->car;
            $obj->tasks  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_started == 1 && $val->is_finished == 0;
            });

            foreach ($tasksUndone as $tu) {
                $obj->tasks[] = $tu;
            }

            $obj->tasks_done  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_finished == 1;
            })->sortByDesc("started_date");
            $obj->tasks_pending  = $tasks->filter(function ($val, $key) use ($driver) {
                return $val->driver_id == $driver->id && $val->is_started == 0;
            });

            $display[] = $obj;
        }

        return view('display', [
            'display' => $display,
        ]);
    }

    public function car()
    {
        $tasks   = Tasks::whereDate('task_date_start', '>=', date('Y-m-d'))->orderBy("task_date_start", "asc")->get();
        $cars    = Cars::get();
        $display = [];

        foreach ($cars as $key => $car) {
            //pindahkan tanpa mobil ke terakhir
            if($car->name == "Tanpa Mobil") {
                unset($cars[$key]);
                $cars[] = $car;
            }
        }

        foreach ($cars as $key => $car) {
            $tasksUndone = Tasks::where('car_id', $car->id)->whereDate('task_date_start', '<', date('Y-m-d'))->where('is_draft', 0)->where('is_started', 1)->where('is_finished', 0)->orderBy("task_date_start", "asc")->get();
            
            $obj         = new \stdClass();
            // $obj->driver = $driver->name;
            $obj->car    = $car;
            $obj->tasks  = $tasks->filter(function ($val, $key) use ($car) {
                return $val->car_id == $car->id && $val->is_started == 1 && $val->is_finished == 0;
            });

            foreach ($tasksUndone as $tu) {
                $obj->tasks[] = $tu;
            }

            $obj->tasks_done  = $tasks->filter(function ($val, $key) use ($car) {
                return $val->car_id == $car->id && $val->is_finished == 1;
            })->sortByDesc("started_date");
            $obj->tasks_pending  = $tasks->filter(function ($val, $key) use ($car) {
                return $val->car_id == $car->id && $val->is_started == 0;
            });

            $display[] = $obj;
        }

        return view('homecar', [
            'display' => $display,
        ]);
    }
}
