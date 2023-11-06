@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listas</h1>
@stop

@section('content')
    <a href="{{ route('listas.create') }}">
        <button class="btn btn-success">Nova lista</button>
    </a>

    <div class="card">

        <div class="card-body">


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($listas as $lista)
                        <tr>
                            <td> {{ $lista->id }} </td>
                            <td> {{ $lista->titulo }} </td>
                            <td>

                                <a href="{{ route('listas.edit', $lista->id) }}"><button type="button"
                                        class="btn btn-warning">
                                        Editar
                                    </button></a>

                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalDeletar{{ $lista->id }}">Deletar</button>
                            </td>
                            <div class="modal fade" id="modalDeletar{{ $lista->id }}" tabindex="-1"
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
                                            Deseja deletar a lista: {{ $lista->titulo }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                            <a href="{{ route('listas.destroy', $lista->id) }}">
                                                <button type="button" class="btn btn-danger">Deletar</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            {{-- {{ $listas->appends($dataForm)->links() }} --}}

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
