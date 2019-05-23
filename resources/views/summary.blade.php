@extends('layouts.app2')

@section('content')
<div class="w-100 p-3">
    <section class="content-header">
      <h1>
        Pengelolaan Kegiatan & Supir & Mobil
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Kegiatan Yang Sedang Berjalan (Supir dan Mobil Yang Sedang Bertugas)</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Supir</th>
                        <th>Mobil</th>
                        <th>Waktu Mulai Renc</th>
                        <th>Waktu Mulai Plsn</th>
                        <th>Waktu Selesai Renc</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($tasksOngoing as $k => $task)
                      <tr>
                        <td>{{$k + 1}}</td>
                        <td>{{$task->task_description}}</td>
                        <td>{{$task->driver->name}}</td>
                        <td>{{$task->car->name}} - {{$task->car->license}}</td>
                        <td>{{$task->task_date_start != null ? \Carbon\Carbon::parse($task->task_date_start)->format("d M Y H:i") : "-"}}</td>
                        <td>{{$task->started_date != null ? \Carbon\Carbon::parse($task->started_date)->format("d M Y H:i") : "-"}}</td>
                        <td>{{$task->task_date_end != null ? \Carbon\Carbon::parse($task->task_date_end)->format("d M Y H:i") : "-"}}</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
              </div>
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Kegiatan Yang Menunggu Pesetujuan</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Supir</th>
                        <th>Mobil</th>
                        <th>Waktu Mulai Renc</th>
                        <th>Waktu Mulai Plsn</th>
                        <th>Waktu Selesai Renc</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($tasksPending as $k => $task)
                      <tr>
                        <td>{{$k + 1}}</td>
                        <td>{{$task->task_description}}</td>
                        <td>{{$task->driver->name}}</td>
                        <td>{{$task->car->name}} - {{$task->car->license}}</td>
                        <td>{{$task->task_date_start != null ? \Carbon\Carbon::parse($task->task_date_start)->format("d M Y H:i") : "-"}}</td>
                        <td>{{$task->started_date != null ? \Carbon\Carbon::parse($task->started_date)->format("d M Y H:i") : "-"}}</td>
                        <td>{{$task->task_date_end != null ? \Carbon\Carbon::parse($task->task_date_end)->format("d M Y H:i") : "-"}}</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="" class="btn btn-sm btn-danger btn-flat pull-right">Lihat semua kegiatan</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Kegiatan Yang Sudah Disetujui & Menunggu Pelaksanaan (Supir dan Mobil Yang Akan Bertugas)</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Supir</th>
                        <th>Mobil</th>
                        <th>Waktu Mulai Renc</th>
                        <th>Waktu Mulai Plsn</th>
                        <th>Waktu Selesai Renc</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($tasksStandby as $k => $task)
                      <tr>
                        <td>{{$k + 1}}</td>
                        <td>{{$task->task_description}}</td>
                        <td>{{$task->driver->name}}</td>
                        <td>{{$task->car->name}} - {{$task->car->license}}</td>
                        <td>{{$task->task_date_start != null ? \Carbon\Carbon::parse($task->task_date_start)->format("d M Y H:i") : "-"}}</td>
                        <td>{{$task->started_date != null ? \Carbon\Carbon::parse($task->started_date)->format("d M Y H:i") : "-"}}</td>
                        <td>{{$task->task_date_end != null ? \Carbon\Carbon::parse($task->task_date_end)->format("d M Y H:i") : "-"}}</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="" class="btn btn-sm btn-warning btn-flat pull-right">Lihat semua kegiatan</a>
                </div>
                <!-- /.box-footer -->
              </div>

            </div>
            <!-- /.col -->

            <div class="col-md-4">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Supir</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Supir</th>
                        <th>No HP</th>
                        <th>Mobil Default</th>
                        <th>S.Supir</th>
                        <th>Log</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($drivers as $key => $driver)
                      <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$driver->name}}</td>
                        <td>{{$driver->no_telp}}</td>
                                    <td>{{$driver->car->name}}</td>
                        <td><span class="label label-{{$driver->is_ontrip ? "success" : "warning"}}">{{$driver->is_ontrip ? "Bertugas" : "Standby"}}</span></td>
                                    <td>-</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
              </div>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Mobil</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Mobil</th>
                        <th>No Plat Mobil</th>
                        <th>Supir Default</th>
                        <th>S.Mobil</th>
                        <th>Akt</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($cars as $key => $car)
                      <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$car->name}}</td>
                        <td>{{$car->license}}</td>
                        <td>{{$car->driver->name}}</td>
                        <td><span class="label label-{{$car->is_ontrip ? "success" : "warning"}}">{{$car->is_ontrip ? "Digunakan" : "Standby"}}</span></td>
                        <td>-</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>
@endsection
