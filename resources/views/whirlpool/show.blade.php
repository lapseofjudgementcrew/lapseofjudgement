@extends('app')
@section('panel-heading')
Whirlpool
@endsection
@section('content')
@foreach ($images as $image)
	<img style='float:left' src={{$image}}>
@endforeach
<div style='padding:20px;float:left'>
	
	<form class="form-horizontal" role="form" method="POST" action="{{route('whirlpool.submit',[$rowid,$colid,$orientation])}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Token 1</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="token1" value="{{ old('token1') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Token 2</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="token2" value="{{ old('token2') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Token 3</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="token3" value="{{ old('token3') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Token 4</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="token4" value="{{ old('token4') }}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Submit
								</button>
							</div>
						</div>
					</form>

</div>
@endsection
