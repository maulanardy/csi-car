@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Request Mobil</div>

                <div class="card-body">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                      {{ session()->get('success') }}  
                    </div><br />
                    @endif

                    <form method="post" action="{{ url('task') }}">
                        @csrf
                        <div class="form-group">
                          <label for="pic_name">Nama:</label>
                          <input type="text" class="form-control" name="pic_name"/>
                        </div>
                        <div class="form-group">
                          <label for="pic_phone">No Handphone:</label>
                          <input type="text" class="form-control" name="pic_phone"/>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="task_date_start">Tanggal Mulai</label>
                          <input type="text" class="form-control datepicker" id="task_date_start" name="task_date_start" placeholder="Mulai Kegiatan" value="{{$taskDateStart}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="task_time_start">Jam Mulai</label>
                          <input type="text" class="form-control clockpicker" id="task_time_start" name="task_time_start" placeholder="Mulai Kegiatan" value="{{$taskTimeStart}}">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="task_date_end">Tanggal Berakhir</label>
                          <input type="text" class="form-control datepicker" id="task_date_end" name="task_date_end" placeholder="Kegiatan Berakhir" value="{{$taskDateEnd}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="task_time_end">Jam Berakhir</label>
                          <input type="text" class="form-control clockpicker" id="task_time_end" name="task_time_end" placeholder="Kegiatan Berakhir" value="{{$taskTimeEnd}}">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="driver_id">Driver</label>
                            <select class="form-control" name="driver_id" id="driver_id">
                                <option>-- Pilih Driver --</option>
                                @foreach($drivers as $driver)
                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="car_id">Mobil</label>
                            <select class="form-control" name="car_id" id="car_id">
                                <option>-- Pilih Mobil --</option>
                                @foreach($cars as $car)
                                    <option value="{{$car->id}}">{{$car->name}} {{$car->license}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                          <label for="name">Deskripsi:</label>
                          <textarea class="form-control" placeholder="Masukan keterangan kegiatan, lokasi tujuan, serta bersama siapa kegiatan berlangsung" name="task_description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd MM yyyy',
            startDate: '0d'
        });
        $('.clockpicker').clockpicker();
    });
</script>
@endsection
