@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Car Lists</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>License</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $k => $car)
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$car->name}}</td>
                                    <td>{{$car->license}}</td>
                                    <td>
                                        @if($car->is_ontrip)
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
