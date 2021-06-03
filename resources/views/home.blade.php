@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="search_text" placeholder="текст для поиска" aria-label="Имя получателя" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="btn_search">Искать</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#btn_search').click(function(e) {
            e.preventDefault();
            console.log($('#search_text').val());

            $( document ).ready(function() {
                $.ajax({
                    crossDomain: true,
                    accept: 'text/html',
                    url: "{{ \App\Models\TenderGuru::url }}",
                    method: 'GET',
                    dataType: "json",
                    data: {
                        api_code: "{{ \App\Models\TenderGuru::api_code }}",
                        dtype:    "{{ \App\Models\TenderGuru::dtype }}",
                        kwords:   $('#search_text').val(),
                    },
                    success: function(data) {
                        console.log('success');
                    },
                    error: function(xhr, status, error){
                        console.error(status);
                    },
                    complete: function (data) {
                        console.log('complete');
                        console.log(data);
                    }

                });
            });
        });
    </script>
@stop
