@extends('layouts.front.master')
@section('title','LRI | Theses')


@section('content')
<br/>
    <div class="col-12">
        <div class="col-12">
            <h2 class="theme-color text-center" style="padding-bottom: 20px;">Liste Des Theses Du Laboratoire</h2>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="col-0 col-md-3 "></div>
                <div class="col-12 col-sm-12 col-md-6 center" style="padding-bottom: 30px">


                    <input class="border form-control center form-control-sm col-12"
                           value="" type="text"
                           id="search"
                           name="search" placeholder="Rechercher"
                           aria-label="Search">
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="container">
                <div class="row" id="affichage">
                </div>
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
                    url: "{{ route('these_search_path') }}",
                    method: 'GET',
                    data: {query: query},
                    dataType: 'json',
                    success: function (data) {
                        $('#affichage').html(data.table_data);
                    }
                })
            }

            function delay(callback, ms) {
                var timer = 0;
                return function () {
                    var context = this, args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                        callback.apply(context, args);
                    }, ms || 0);
                };
            }

            $(document).on('keyup', '#search',delay( function () {
                var query = $(this).val();
                fetch_customer_data(query);
            },440));
        });

    </script>
@stop