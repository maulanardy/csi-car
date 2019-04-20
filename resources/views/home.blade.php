@extends('layouts.app')

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

ul.task li.disabled {
    background: none;
    padding: 0px;
    border: none;
}
</style>

@section('content')
<div class="container" style="max-width: 100%">
    <div class="row justify-content-center col-md-12">
        @foreach ($display as $k => $v)
            <div class="col-md-1" style="flex: 0 0 11%; max-width: 11%;">
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
                                    <li class="disabled text-secondary">Belum Ada Task</li>
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
                                    <li class="disabled text-secondary">STANDBY</li>
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
                                    <li class="disabled text-secondary">Belum Ada Task</li>
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