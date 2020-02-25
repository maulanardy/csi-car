@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($display as $k => $v)
                <div class="card mb-3">
                    <div class="card-header" style="background:#88a5bd; color:#FFF"><h4>{{$k + 1}}. {{$v->driver->name}} ({{$v->driver->no_telp}}) - {{$v->car->name}}<span class="clock float-right"></span></h4></div>

                    <div class="card-body row" style="background: #e6e6e6;">
                        <div class="col-md-4">
                            <table class="table table-bordered bg-white">
                                <thead>
                                    <tr><th class="bg-danger text-light">Tugas Selesai</th></tr>
                                </thead>
                                <tbody>
                                    @if(count($v->tasks_done) == 0)
                                        <tr><td class="text-center">Belum Ada Task</td></tr>
                                    @endif

                                    @foreach ($v->tasks_done as $k => $task)
                                        <tr>
                                            <td>
                                                <div class="mb-3">
                                                    <span style="color:#379bef">{{date('d F Y H:i', strtotime($task->task_date_start))}}</span>
                                                    - 
                                                    {{date('d F Y H:i', strtotime($task->task_date_end))}}
                                                </div>
                                                
                                                <table class="table table-borderless table-sm table-primary" style="background-color:#FFF">
                                                    <tr>
                                                        <td>{{$task->car->name}} - {{$task->car->license}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$task->driver->name}} - {{$task->driver->no_telp}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>({{$task->requestedBy->name}}) {{$task->pic_name}} - {{$task->pic_phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$task->task_description}}</td>
                                                    </tr>
                                                </table>
                                                <div class="mb-3">{{date('d F Y H:i', strtotime($task->started_date))}} - {{date('d F Y H:i', strtotime($task->finished_date))}}</div>
                                                <div class="mb-3">Lokasi Selesai: <a target="_blank" href="https://www.google.com/maps/search/?api=1&query={{$task->finished_latitude}},{{$task->finished_longitude}}">Lihat</a></div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered bg-white">
                                <thead>
                                    <tr><th class="bg-success text-light">Sedang Bertugas</th></tr>
                                </thead>
                                <tbody>
                                    @if(count($v->tasks) == 0)
                                        <tr><td class="text-center">STANDBY</td></tr>
                                    @endif

                                    @foreach ($v->tasks as $k => $task)
                                        <tr>
                                            <td>
                                                <div class="mb-3">
                                                    <span style="color:#379bef">{{date('d F Y H:i', strtotime($task->task_date_start))}}</span>
                                                    - 
                                                    {{date('d F Y H:i', strtotime($task->task_date_end))}}
                                                </div>

                                                <table class="table table-borderless table-sm table-primary" style="background-color:#FFF">
                                                    <tr>
                                                        <td>{{$task->car->name}} - {{$task->car->license}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$task->driver->name}} - {{$task->driver->no_telp}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>({{$task->requestedBy->name}}) {{$task->pic_name}} - {{$task->pic_phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$task->task_description}}</td>
                                                    </tr>
                                                </table>
                                                <div class="mb-3">{{date('d F Y H:i', strtotime($task->started_date))}}</div>
                                                <div class="mb-3">Lokasi Mulai : <a target="_blank" href="https://www.google.com/maps?q={{$task->started_latitude}},{{$task->started_longitude}}&ll={{$task->started_latitude}},{{$task->started_longitude}}&z=12">Lihat</a></div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered bg-white">
                                <thead>
                                    <tr><th class="" style="background-color: #ffeaa7!important;">Tugas Selanjutnya</th></tr>
                                </thead>
                                <tbody>
                                    @if(count($v->tasks_pending) == 0)
                                        <tr><td class="text-center">Belum Ada Task</td></tr>
                                    @endif

                                    @foreach ($v->tasks_pending as $k => $task)
                                        <tr>
                                            <td>
                                                <div class="mb-3">
                                                    <span style="color:#379bef">{{date('d F Y H:i', strtotime($task->task_date_start))}}</span>
                                                    - 
                                                    {{date('d F Y H:i', strtotime($task->task_date_end))}}
                                                </div>
                                                
                                                <table class="table table-borderless table-sm table-primary" style="background-color:#FFF">
                                                    <tr>
                                                        <td>{{$task->car->name}} - {{$task->car->license}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$task->driver->name}} - {{$task->driver->no_telp}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>({{$task->requestedBy->name}}) {{$task->pic_name}} - {{$task->pic_phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$task->task_description}}</td>
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
<script type="text/javascript">
function update() {
  $('.clock').html(moment().format('H:mm:ss'));
}

setInterval(update, 1000);
</script>
@endsection
