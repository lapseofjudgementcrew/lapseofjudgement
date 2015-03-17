@extends('app')
@section('panel-heading')
Welcome
@endsection
@section('content')
<div id="container">
	<div id="content">
		<div id="title">Laravel 5</div>
		<div id="quote">{{ Inspiring::quote() }}</div>
	</div>
</div>
@endsection
