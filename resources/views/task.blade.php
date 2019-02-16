@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-light">Today Task Lists</div>

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
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $k => $task)
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
                                        @else
                                            <span class="badge badge-danger">Pending</span>
                                        @endif
                                    </td>
                                </tr>
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
