@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Create Task</div>

                <div class="card-body">
									<form action="/foo/bar" method="POST">
									    @method('PUT')
										  <div class="form-group">
										    <label for="name">Name</label>
										    <input type="text" class="form-control" id="name" placeholder="Name">
										  </div>
									</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
