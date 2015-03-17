@extends('app')
@section('panel-heading')
Change Password
@endsection
@section('content')
@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form class="form-horizontal" role="form" method="POST" action="change-password">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label class="col-md-4 control-label">Current Password</label>
		<div class="col-md-6">
			<input type="password" class="form-control" name="current_password">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label">New Password</label>
		<div class="col-md-6">
			<input type="password" class="form-control" name="password">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label">Confirm New Password</label>
		<div class="col-md-6">
			<input type="password" class="form-control" name="password_confirmation">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				Change Password
			</button>
		</div>
	</div>
</form>
@endsection
