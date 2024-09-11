<?php

namespace App\Http\Controllers;

use App\Models\ItemLista;
use App\Models\Lista;
use App\Models\Produto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ItemListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_lista)
    {
        //Jogar join do ItemLista para o Service
        //Criar método booleano isAtivo() para todas as models
        try {
            $lista = Lista::findOrFail($id_lista);
            $itens = ItemLista::join('produtos', 'produtos.id', '=', 'item_listas.id_produto')
                ->join('listas', 'listas.id', '=', 'item_listas.id_lista')
                ->where('id_lista', $id_lista)
                ->where('item_listas.ativo', true)
                ->select('item_listas.*')
                ->orderBy('produtos.nome', 'asc')
                ->get();

            return view('listas.itens.index', compact('itens', 'lista'));
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
        $lista = Lista::findOrFail($id_lista);
        $produtos = Produto::where('ativo', true)->orderBy('nome', 'asc')->get();

        return view('listas.itens.create', compact('lista','produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_lista)
    {
        try {
            $item = new ItemLista();
            $item->id_produto = $request->id_produto;
            $item->quantidade = $request->quantidade;
            $item->id_lista = $id_lista;
            $item->ativo = true;
            $item->save();

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
            $lista = Lista::findOrFail($id_lista);
            $produtos = Produto::where('ativo', true)->orderBy('nome', 'asc')->get();
            $item = ItemLista::findOrFail($id_item);

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
    public function update(Request $request, $id_lista, $id_item)
    {
        try {
            $item = ItemLista::findOrFail($id_item);
            $item->id_produto = $request->id_produto;
            $item->quantidade = $request->quantidade;
            $item->id_lista = $id_lista;
            $item->save();

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
            $item = ItemLista::findOrFail($id_item);
            $item->ativo = false;
            $item->save();

            Alert::success('Tudo Certo', 'Item excluído com sucesso');
            return redirect()->route('listas.itens.index', $id_lista);
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }
}
