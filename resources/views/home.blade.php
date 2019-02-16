@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($display as $k => $v)
                <div class="card mb-3">
                    <div class="card-header"><h4>{{$v->driver}}</h4></div>

                    <div class="card-body row">
                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr><th class="bg-secondary text-light">DONE</th></tr>
                                </thead>
                                <tbody>
                                    @if(count($v->tasks_done) == 0)
                                        <tr><td class="text-center">Belum Ada Task</td></tr>
                                    @endif

                                    @foreach ($v->tasks_done as $k => $task)
                                        <tr>
                                            <td>
                                                <div class="mb-3">{{date('d F Y', strtotime($task->task_date_start))}}
                                                <strong class="float-right">{{date('H:i', strtotime($task->task_date_start))}} - {{date('H:i', strtotime($task->task_date_end))}}</strong></div>

                                                <table class="table table-borderless table-sm table-primary" style="background-color:#FFF">
                                                    <tr>
                                                        <th>Mobil</th>
                                                        <td>{{$task->car->name}} - {{$task->car->license}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Request</th>
                                                        <td>{{$task->pic_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">{{$task->task_description}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr><th class="bg-success text-light">ON TRIP</th></tr>
                                </thead>
                                <tbody>
                                    @if(count($v->tasks) == 0)
                                        <tr><td class="text-center">STANDBY</td></tr>
                                    @endif

                                    @foreach ($v->tasks as $k => $task)
                                        <tr>
                                            <td>
                                                <div class="mb-3">{{date('d F Y', strtotime($task->task_date_start))}}
                                                <strong class="float-right">{{date('H:i', strtotime($task->task_date_start))}} - {{date('H:i', strtotime($task->task_date_end))}}</strong></div>

                                                <table class="table table-borderless table-sm table-primary" style="background-color:#FFF">
                                                    <tr>
                                                        <th>Mobil</th>
                                                        <td>{{$task->car->name}} - {{$task->car->license}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Request</th>
                                                        <td>{{$task->pic_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">{{$task->task_description}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr><th class="bg-secondary text-light">UPCOMING</th></tr>
                                </thead>
                                <tbody>
                                    @if(count($v->tasks_pending) == 0)
                                        <tr><td class="text-center">Belum Ada Task</td></tr>
                                    @endif

                                    @foreach ($v->tasks_pending as $k => $task)
                                        <tr>
                                            <td>
                                                <div class="mb-3">{{date('d F Y', strtotime($task->task_date_start))}}
                                                <strong class="float-right">{{date('H:i', strtotime($task->task_date_start))}} - {{date('H:i', strtotime($task->task_date_end))}}</strong></div>

                                                <table class="table table-borderless table-sm table-primary" style="background-color:#FFF">
                                                    <tr>
                                                        <th>Mobil</th>
                                                        <td>{{$task->car->name}} - {{$task->car->license}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Request</th>
                                                        <td>{{$task->pic_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">{{$task->task_description}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</div>
<script src="{!!url('/js/jquery.min.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $down = 0;
        $block = false;

        setTimeout(function() {
            $("html, body").animate({ scrollTop: 0 }, 500);
        },100);

        setTimeout(function() {
            setInterval(function(){
                if(!$block){
                    console.log("down!")
                    $("html, body").animate({ scrollTop: $down }, 10);
                    $down = $down + 1;

                    if($down >= $(document).height()){
                        $block = true;
                        setTimeout(function() {
                           location.reload();
                        },5000);
                    } 
                }
            },10);
        },5000);
    })
</script>
@endsection
