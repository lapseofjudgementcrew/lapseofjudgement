@extends('app')
@section('panel-heading')
Login
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
<form class="form-horizontal" role="form" method="POST" action="{{route('session.store')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label class="col-md-4 control-label">Puzzle Pirates Name</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="yppname" value="{{ old('yppname') }}">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">Password</label>
		<div class="col-md-6">
			<input type="password" class="form-control" name="password">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember"> Remember Me
				</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
				Login
			</button>
			
		</div>
	</div>
</form>
@endsection
