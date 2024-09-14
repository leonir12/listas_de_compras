@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Consultar quantidade de produtos</h1>
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
                            <select class="form-control @error('id_lista_inicio') is-invalid @enderror"
                                name="id_lista_inicio">
                                <option selected disabled> Selecione </option>
                                @foreach ($listas as $lista)
                                    <option value={{ $lista->id }} {{ $lista->id == old('id_lista_inicio') ? 'selected' : '' }}> {{ $lista->titulo }}</option>
                                @endforeach
                            </select>
                            @error('id_lista_inicio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="inputStatus">Lista final</label>
                        <select class="form-control @error('id_lista_final') is-invalid @enderror" name="id_lista_final">
                            <option selected disabled> Selecione </option>
                            @foreach ($listas as $lista)
                                <option value={{ $lista->id }} {{ $lista->id == old('id_lista_final') ? 'selected' : '' }}> {{ $lista->titulo }}</option>
                            @endforeach
                        </select>
                        @error('id_lista_final')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="inputStatus">Produto</label>
                        <select class="form-control @error('id_produto') is-invalid @enderror" name="id_produto">
                            <option selected disabled> Selecione </option>
                            @foreach ($produtos as $produto)
                                <option value={{ $produto->id }} {{ $produto->id == old('id_produto') ? 'selected' : '' }}> {{ $produto->nome }}</option>
                            @endforeach
                        </select>
                        @error('id_produto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Consultar</button>


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
