@extends('../../layouts.front.master')

@section('title','LRI | Liste des articles')

@section('header_page')
      <h1>
        articles
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('articles')}}">articles</a></li>
      </ol>

@endsection

@section('content')

<br/>
<div class="col-12" style="padding-bottom: 30px">
    <h2 class="theme-color text-center">Liste Des Articles Du Laboratoire</h2>
</div>

<div class="col-12">
	<div class="row">
		<div class="col-6 col-md-7 col-sm-6"></div>
		<div class="pull-right col-12 col-sm-6 col-md-5" style="padding-bottom: 30px">


			<input class="border form-control form-control-sm mr-3 w-75"
				   value="" type="text"
				   id="search"
				   name="search" placeholder="Rechercher"
				   aria-label="Search">
		</div>
	</div>
</div>

<div class="container">

	
			<div class="row" id="affichage">



						</div>

				{{-- 	</div> card deck
				</div> {{ row }} --}}
	</div> <!-- container -->




@endsection

@section('script')
	<script>
		$(document).ready(function () {

			fetch_customer_data();

			function fetch_customer_data(query = '') {
				$.ajax({
					url: "{{ route('article_search_path') }}",
					method: 'GET',
					data: {query: query},
					dataType: 'json',
					success: function (data) {
						$('#affichage').html(data.table_data);
					}
				})
			}

			$(document).on('keyup', '#search', function () {
				var query = $(this).val();
				fetch_customer_data(query);
			});
		});

	</script>
@stop