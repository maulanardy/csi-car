<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\Drivers;
use App\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks         = Tasks::whereDate('task_date_start', '=', date('Y-m-d'))->orderBy("task_date_start", "desc")->get();
        $upcomingTasks = Tasks::whereDate('task_date_start', '>', date('Y-m-d'))->orderBy("task_date_start", "desc")->get();

        return view('task', [
            'tasks'         => $tasks,
            'upcomingTasks' => $upcomingTasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $start = Carbon::now()->addHour();
        $end   = Carbon::now()->addHour(2);

        return view('task-create', [
            "cars" => Cars::all(),
            "drivers" => Drivers::where("is_active", 1)->get(),
            "taskDateStart" => $start->format('d F Y'),
            "taskTimeStart" => $start->format('H:i'),
            "taskDateEnd" => $end->format('d F Y'),
            "taskTimeEnd" => $end->format('H:i'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Tasks();
        $task->driver_id        = $request->get('driver_id');
        // $task->car_id           = Drivers::find($request->get('driver_id'))->default_car_id;
        $task->car_id           = $request->get('car_id');
        $task->task_date_start  = Carbon::parse($request->get('task_date_start') . " " . $request->get('task_time_start'))->format('Y-m-d H:i:s');
        $task->task_date_end    = Carbon::parse($request->get('task_date_end') . " " . $request->get('task_time_end'))->format('Y-m-d H:i:s');
        $task->task_description = $request->get('task_description');
        $task->pic_name         = $request->get('pic_name');
        $task->pic_phone        = $request->get('pic_phone');
        $task->is_started       = 0;
        $task->is_finished      = 0;
        $task->is_draft         = 1;
        $task->created_by       = Auth::id();

        $task->save();
        return redirect('/task')->with('success', 'Request berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
