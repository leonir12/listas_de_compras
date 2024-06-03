@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Consulta</h1>
@stop

@section('content')
    {{-- <a href="{{ route('produtos.create') }}">
        <button class="btn btn-success">Novo produto</button>
    </a> --}}

    <div class="card">

        <div class="card-body">


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{ $item->nome }} </td>
                        <td> {{ $quantidade }} </td>
                    </tr>
                </tbody>
            </table>

            {{-- {{ $produtos->appends($dataForm)->links() }} --}}

        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
