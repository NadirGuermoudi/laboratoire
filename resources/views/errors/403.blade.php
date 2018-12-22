@extends('layouts.master', ['active' => ''])

@section('title')
    {{$labo->nom}} | Erreur 403
@endsection

@section('header_page')

      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> dashboard</a></li>
        
        <li class="active">403 error</li>
      </ol>

@endsection

@section('content')

<div class="error-page">

  <br><br><br><br><br><br>
        <h2 class="headline text-red"></h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Cette action est non autorisée.</h3>

        </div>
      </div>
      <!-- /.error-page -->


@endsection