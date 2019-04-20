@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        @foreach ($display as $k => $v)
            <div class="col-md-1">
                <div class="card">
                    <div class="card-header row" style="background:#88a5bd; color:#FFF; padding: 10px; height: 160px">
                        <span style="font-size: 9pt; height: 40px; margin-bottom: 20px" class="">{{$v->driver}}</span>
                        <span style="font-size: 9pt; margin-bottom: 20px" class="">{{$v->car->name}}</span>
                        <span style="font-size: 9pt; height: 40px" class="">{{$v->car->license}}</span>
                    </div>
                    <div class="card-body row" style="background: #e6e6e6; padding: 5px">
                        <div style="width: 100%">
                            <span class="font-weight-bold">Akan</span>
                            <ul class="task">
                                @if(count($v->tasks_pending) == 0)
                                    <li>Belum Ada Task</li>
                                @endif

                                @foreach ($v->tasks_pending as $k => $task)
                                    <li>{{$task->task_description}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div style="width: 100%">
                            <span class="text-success font-weight-bold">Sedang</span>
                            <ul class="task">
                                @if(count($v->tasks) == 0)
                                    <li>STANDBY</li>
                                @endif

                                @foreach ($v->tasks as $k => $task)
                                    <li>{{$task->task_description}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div style="width: 100%">
                            <span class="text-danger font-weight-bold">Sudah</span>
                            <ul class="task">
                                @if(count($v->tasks_done) == 0)
                                    <li>Belum Ada Task</li>
                                @endif

                                @foreach ($v->tasks_done as $k => $task)
                                    <li>{{$task->task_description}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach 
    </div>
</div>
@endsection

<style type="text/css">
ul.task {
    padding: 0px;
    font-size: 12px;
}

ul.task li {
    background: #FFF;
    list-style: none;
    margin-bottom: 1px;
    padding: 1px 6px;
    border-bottom: 1px solid #afafaf;
}
</style>