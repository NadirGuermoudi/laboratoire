@extends('layouts.front.master')

@section('title','LRI | Liste des equipes')

@section('header')

@stop

@section('content')
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="col-12 ">
                <div class="col-12" style="padding-bottom: 30px">
                    <h2 class="theme-color text-center">Liste Des Equipes Du Laboratoire</h2>
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

                <!-- /.box-header -->
                <div class="box-header" style="padding-bottom: 20px">


                    <div id="affichage" class="row">

                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>


@stop

@section('script')
    <script>
        $(document).ready(function () {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('equipes_search_path') }}",
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