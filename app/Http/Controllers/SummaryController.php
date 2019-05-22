<?php

namespace App\Http\Controllers;

use App\Drivers;
use App\Cars;
use App\Tasks;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['drivers']       = Drivers::all();
        $data['cars']          = Cars::all();
        $data['driversOnDuty'] = Drivers::where("is_ontrip", "=", 1)->get();
        $data['tasksOngoing'] = Tasks::where("is_started","=",1)
            ->where("is_finished","=",0)
            ->where("is_canceled","=", null)
            ->where("is_draft","=",0)
            ->orderBy("task_date_start", "asc")
            ->take(5)
            ->get();
        $data['tasksPending'] = Tasks::where("is_started","=",0)
            ->where("is_finished","=",0)
            ->where("is_canceled","=", null)
            ->where("is_draft","=",1)
            ->orderBy("task_date_start", "asc")
            ->take(5)
            ->get();
        $data['tasksStandby'] = Tasks::where("is_started","=",0)
            ->where("is_finished","=",0)
            ->where("is_canceled","=", null)
            ->where("is_draft","=",0)
            ->orderBy("task_date_start", "asc")
            ->take(5)
            ->get();

        return view('summary')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
