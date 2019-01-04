@extends('layouts.master', ['active' => 'dashboard'])

@section('title','LRI | Dashboard')

@section('header_page')
    <h1>
        Dashboard
   </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
@endsection

@section('content')
<div class="container box">
	<div class="row">
		<div class="box-header col-xs-12">
			<h3 class="box-title"> Actualités </h3>
		</div>
	</div>
	
	<div class="nav-tabs-custom col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#generale" data-toggle="tab">Générale</a></li>
			<li><a href="#membres" data-toggle="tab">Membres</a></li>
			<li><a href="#theses" data-toggle="tab">Theses</a></li>
			<li><a href="#articles" data-toggle="tab">Articles</a></li>
			<li><a href="#projets" data-toggle="tab">Projets</a></li>
			<li><a href="#materials" data-toggle="tab">Matériels</a></li>
			<li><a href="#partenaires" data-toggle="tab">Partenaires</a></li>
		</ul>

		<div class="tab-content">
			<div class="active tab-pane" id="generale">
				@include('statistique/generale')
			</div>

			<div class="tab-pane" id="membres">
				@include('statistique/membres')
			</div>

			<div class="tab-pane" id="theses">
				@include('statistique/theses')
			</div>

			<div class="tab-pane" id="articles">
				@include('statistique/articles')
			</div>

			<div class="tab-pane" id="projets">
				@include('statistique/projets')
			</div>

			<div class="tab-pane" id="materials">
				@include('statistique/materials')
			</div>

			<div class="tab-pane" id="partenaires">
				@include('statistique/partenaires')
			</div>

		</div><!-- /.tab-content -->

	</div><!-- fin nav-tabs-custom -->
</div>
@endsection

@push('scripts.footer')
	<script src="{{ asset('js/chart-js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('js/chart-js/Chart.min.js') }}"></script>
@endpush