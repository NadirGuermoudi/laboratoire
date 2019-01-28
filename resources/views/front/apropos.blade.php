@extends('layouts.front.master')
@section('title','LRI | A propos')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="{{$labo->photo1}}" style="width: 100%; height: 200px;">
			</div>
			<div class="col-md-4">
				<img src="{{$labo->photo2}}" style="width: 100%; height: 200px;">
			</div>
			<div class="col-md-4">
				<img src="{{$labo->photo3}}" style="width: 100%; height: 200px;">
			</div>
		</div>

		<br>
		<br>
		<br>

		<div class="row">
			<p>{!! $labo->apropos !!}</p>
		</div>
	</div>
@endsection