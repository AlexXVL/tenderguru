@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="search_text" placeholder="текст для поиска" aria-label="Имя получателя" aria-describedby="basic-addon2" value="{{ old('kwords', isset($kwords) ? $kwords : null)}}">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="btn_search">Искать</button>
            </div>
        </div>

        <div class="input-group mb-3">
            <button class="btn-primary" id="btn_save">Сохранить</button>
        </div>

        <div>Вы искали: <span id="kwords">{{ isset($kwords) ? $kwords : null }}</span></div>
        <table class="table table-striped" id="result_table">
            @isset($decode)
                @if(count($decode))
                    @php
                        $keys= array_keys($decode[0]);
                    @endphp

                    @foreach($decode as $item)
                        <tr>
                            <td>
                                <input type="checkbox" id="{{ $item['TendNumber'] }}">
                            </td>
                            <td id="data-{{ $item['TendNumber'] }}">
                                @foreach($keys as $key)
                                    {{ $key }}: {{ $item[$key] }}<br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                @endif
            @endisset
        </table>
    </div>
@endsection

@section('js')
    <script>
        $( document ).ready(function() {
            $('#btn_search').click(function(e) {
                e.preventDefault();
                $('#result_table').html('');
                window.location= '/search/' + $('#search_text').val();
            });


            $('#btn_save').click(function(e) {
                let arr= [];
                $('input:checkbox:checked').each(function(){
                    arr.push($('#data-' + $(this).attr('id')).text());
                });
                //alert(arr);

                $.ajax({
                    url: "{{ route('guru.store') }}",
                    method: 'post',
                    dataType: 'json',
                    data: {
                        kwords: $('#kwords').text(),
                        data: arr
                    },
                    success: function(data){
                        alert(data);
                    }

                });
            });
        });
    </script>
@stop
