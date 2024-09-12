<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemListaRequest;
use App\Http\Requests\UpdateItemListaRequest;
use App\Models\ItemLista;
use App\Models\Lista;
use App\Services\ItemListaService;
use App\Services\ListaService;
use App\Services\ProdutoService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ItemListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id_lista)
    {
        //Criar método booleano isAtivo() para todas as models
        try {
            $lista = Lista::findOrFail($id_lista);
            $itens = ItemListaService::getItens($id_lista);
            $dataForm = $request->except('_token');

            return view('listas.itens.index', compact('itens', 'lista', 'dataForm'));
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_lista)
    {
        $lista = ListaService::findListaAtiva($id_lista);
        $produtos = ProdutoService::getTodosProdutos();

        return view('listas.itens.create', compact('lista','produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemListaRequest $request, $id_lista)
    {
        try {
            ItemLista::create($request->validated() + ['id_lista' => $id_lista]);
            Alert::success('Tudo Certo', 'Item cadastrado com sucesso');

            return redirect()->route('listas.itens.index', $id_lista);
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_lista, $id_item)
    {
        try {
            $lista = ListaService::findListaAtiva($id_lista);
            $produtos = ProdutoService::getTodosProdutos();
            $item = ItemListaService::findItemAtivo($id_item);

            return view('listas.itens.edit', compact('lista', 'item','produtos'));
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemListaRequest $request, $id_lista, $id_item)
    {
        try {
            $item = ItemListaService::findItemAtivo($id_item);
            $item->update($request->validated());
            Alert::success('Tudo Certo', 'Item alterado com sucesso');

            return redirect()->route('listas.itens.index', $id_lista);
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_lista, $id_item)
    {
        try {
            $item = ItemListaService::findItemAtivo($id_item);
            $item->ativo = ItemListaService::INATIVO;
            $item->save();

            Alert::success('Tudo Certo', 'Item excluído com sucesso');
            return redirect()->route('listas.itens.index', $id_lista);
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }
}
