@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Driver Lists</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Default Car</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drivers as $k => $driver)
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$driver->name}}</td>
                                    <td>{{$driver->telp}}</td>
                                    <td>{{$driver->car->name}} - {{$driver->car->license}}</td>
                                    <td>
                                        @if($driver->is_ontrip)
                                            <span class="text-danger">On Trip</span>
                                        @else
                                            <span class="text-success">Standby</span>
                                        @endif
                                    </td>
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
