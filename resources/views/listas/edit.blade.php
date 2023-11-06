@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listas</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">

        <form action="{{ route('listas.update', $lista->id) }}" method="POST">
            @csrf
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Título</label>
                    <input type="text" value="{{ $lista->titulo }}" class="form-control @error('titulo') is-invalid @enderror" name="titulo" placeholder="titulo do lista">
                    @error('titulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
    <script> console.log('Hi!'); </script>
@stop





