@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listas</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">

        <form action="{{ route('listas.itens.update', ['id_lista' => $lista->id, 'id_item' => $item->id]) }}" method="POST">
            @csrf
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Produto</label>
                    <select name="id_produto" class="form-control @error('id_produto') is-invalid @enderror" required
                        id="">
                        <option selected disabled> Selecione </option>
                        @foreach ($produtos as $produto)
                            <option value={{ $produto->id }} {{ $produto->id == $item->id_produto ? 'selected' : '' }}> {{ $produto->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_produto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="inputAddress2">Quantidade</label>
                    <input type="number" value="{{ $item->quantidade }}" class="form-control @error('quantidade') is-invalid @enderror"
                        id="inputQuantidade" name="quantidade" placeholder="Quantidade do item">
                    @error('quantidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Salvar</button>


            <a href="{{ route('listas.itens.index', $lista->id) }}">
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





