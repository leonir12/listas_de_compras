@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Itens</h1>
@stop

@section('content')
    <a href="{{ route('listas.itens.create', $lista->id) }}">
        <button class="btn btn-success">Novo item</button>
    </a>

    <div class="card">

        <div class="card-body">


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($itens as $item)
                        <tr>
                            <td> {{ $item->produto->nome }} </td>
                            <td> {{ $item->quantidade }} </td>
                            <td>

                                <a href="{{ route('listas.itens.edit', ['id_lista' => $item->id_lista, 'id_item' => $item->id]) }}"><button type="button"
                                        class="btn btn-warning">
                                        Editar
                                    </button></a>

                                {{-- <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalDeletar{{ $item->id }}">Deletar</button> --}}
                            </td>
                            {{-- <div class="modal fade" id="modalDeletar{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Deseja deletar a item: {{ $item->nome }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                            <a href="{{ route('itens.destroy', $item->id) }}">
                                                <button type="button" class="btn btn-danger">Deletar</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>

            {{-- {{ $itens->appends($dataForm)->links() }} --}}

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
