@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-light">Today Task Lists <a href="{{url("task/create")}}" class="btn btn-light float-right">Request Mobil</a></div>

                <div class="card-body">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                      {{ session()->get('success') }}  
                    </div><br />
                    @endif

                    <form method="get" action="" class="form-inline float-right">
                      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">filter: </label>
                      <select name="filter" class="my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref">
                        <option selected>-- All--</option>
                        <option value="1" {{Request::get('filter') == 1 ? "selected" : ""}}>Cancelled</option>
                        <option value="2" {{Request::get('filter') == 2 ? "selected" : ""}}>Complete</option>
                        <option value="3" {{Request::get('filter') == 3 ? "selected" : ""}}>On Trip</option>
                        <option value="4" {{Request::get('filter') == 4 ? "selected" : ""}}>Approved</option>
                        <option value="5" {{Request::get('filter') == 5 ? "selected" : ""}}>Waiting Approval</option>
                      </select>

                      <button type="submit" class="btn btn-primary my-1">Apply</button>
                    </form>

                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Request By</th>
                                <th>Task</th>
                                <th>Driver Name</th>
                                <th>Car</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            switch (Request::get('filter')) {
                                case 1:
                                    $filtered = $tasks->filter(function ($value, $key) {
                                        return $value->is_canceled == 1;
                                    });
                                    break;
                                case 2:
                                    $filtered = $tasks->filter(function ($value, $key) {
                                        return $value->is_finished == 1;
                                    });
                                    break;
                                case 3:
                                    $filtered = $tasks->filter(function ($value, $key) {
                                        return $value->is_started == 1;
                                    });
                                    break;
                                case 4:
                                    $filtered = $tasks->filter(function ($value, $key) {
                                        return $value->is_draft == 0;
                                    });
                                    break;
                                case 5:
                                    $filtered = $tasks->filter(function ($value, $key) {
                                        return ($value->is_draft == 1 && $value->is_canceled == 0);
                                    });
                                    break;
                                
                                default:
                                    $filtered = $tasks;
                                    break;
                            }
                            @endphp

                            @foreach ($filtered as $k => $task)
                                {{-- @if(Request::get('filter') == $) --}}
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$task->pic_name}}</td>
                                    <td>{{str_limit($task->task_description, 40)}}</td>
                                    <td>{{$task->driver->name}}</td>
                                    <td>{{$task->car->name}} - {{$task->car->license}}</td>
                                    <td>{{date('d M Y H:i', strtotime($task->task_date_start))}} - {{date('H:i', strtotime($task->task_date_end))}}</td>
                                    <td>
                                        @if($task->is_canceled == 1)
                                            <span class="badge badge-dark">Cancelled</span>
                                        @elseif($task->is_finished == 1)
                                            <span class="badge badge-success">Complete</span>
                                        @elseif($task->is_started == 1)
                                            <span class="badge badge-warning">On Trip</span>
                                        @elseif($task->is_draft == 0)
                                            <span class="badge badge-primary">Approved</span>
                                        @else
                                            <span class="badge badge-danger">Waiting Approval</span>
                                        @endif
                                    </td>
                                </tr>
                                {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header bg-dark text-light">Upcoming Task Lists</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Request By</th>
                                <th>Task</th>
                                <th>Driver Name</th>
                                <th>Car</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($upcomingTasks as $k => $task)
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$task->pic_name}}</td>
                                    <td>{{str_limit($task->task_description, 40)}}</td>
                                    <td>{{$task->driver->name}}</td>
                                    <td>{{$task->car->name}} - {{$task->car->license}}</td>
                                    <td>{{date('d M Y H:i', strtotime($task->task_date_start))}} - {{date('H:i', strtotime($task->task_date_end))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
