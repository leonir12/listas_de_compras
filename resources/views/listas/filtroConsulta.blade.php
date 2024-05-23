@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listas</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('listas.consultar') }}" method="GET">
                @csrf
                <div class="form-row">

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="inputStatus">Lista início</label>
                            <select class="form-control" required name="id_lista_inicio">
                                <option selected disabled> Selecione </option>
                                @foreach ($listas as $lista)
                                    <option value={{ $lista->id }}> {{ $lista->titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="inputStatus">Lista final</label>
                        <select class="form-control" required name="id_lista_final">
                            <option selected disabled> Selecione </option>
                            @foreach ($listas as $lista)
                                <option value={{ $lista->id }}> {{ $lista->titulo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputStatus">Produto</label>
                        <select class="form-control" required name="id_produto">
                            <option selected disabled> Selecione </option>
                            @foreach ($produtos as $produto)
                                <option value={{ $produto->id }}> {{ $produto->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>


                    <a href="{{ route('listas.index') }}">
                        <button type="button" class="btn btn-success">Voltar</button>
                    </a>
            </form>
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
