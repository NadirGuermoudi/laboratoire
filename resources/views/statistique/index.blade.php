@extends('layouts.master', ['active' => 'dashboard'])

@section('title','LRI | Dashboard')

@section('header_page')
    <h1>
        Dashboard
   </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
@endsection

@push('scripts.footer')
	<script src="{{ asset('js/chart-js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('js/chart-js/Chart.min.js') }}"></script>
@endpush

@section('content')
<div class="container box">
	<div class="row">
		<div class="box-header col-xs-12">
			<h3 class="box-title"> Statistiques </h3>
		</div>
	</div>
	
	<div class="nav-tabs-custom col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#generale" data-toggle="tab">Générale</a></li>
			<li><a id="lienMembres" href="#membres" data-toggle="tab" onclick="createPieMombre()">Membres</a></li>
			<li><a id="lienThese" href="#theses" data-toggle="tab" onclick="createBarThesesThesard()">Theses</a></li>
			<li><a id="lienArticles" href="#articles" data-toggle="tab" onclick="createBarArticles()">Articles</a></li>
			<li><a id="lienProjets" href="#projets" data-toggle="tab" onclick="createBarProjets()">Projets</a></li>
			<li><a id="lienMaterials" href="#materials" data-toggle="tab" onclick="createPieMaterialsEmpruntable()">Matériels</a></li>
			<li><a id="lienPartenaires" href="#partenaires" data-toggle="tab" onclick="createPiePartenaires()">Partenaires</a></li>
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