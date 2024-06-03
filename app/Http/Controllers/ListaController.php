<?php

namespace App\Http\Controllers;

use App\Models\ItemLista;
use App\Models\Lista;
use App\Models\Produto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ListaController extends Controller
{
    public function index() {

        try {
            $listas = Lista::where('ativo', true)->get();

            return view('listas.index', compact('listas'));
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }

    public function create()  {
        return view('listas.create');
    }

    public function store(Request $request) {
        try {
            $lista = new Lista();
            $lista->titulo = $request->titulo;
            $lista->ativo = true;
            $lista->save();

            Alert::success('Tudo Certo', 'Lista cadastrada com sucesso');
            return redirect()->route('listas.index');
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }

    public function edit($id) {
        try {
            $lista = Lista::findOrFail($id);

            return view('listas.edit', compact('lista'));
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }


    public function update(Request $request, $id) {

        try {
            $lista = Lista::findOrFail($id);
            $lista->titulo = $request->titulo;
            $lista->save();

            Alert::success('Tudo Certo', 'Lista atualizada com sucesso');
            return redirect()->route('listas.index');
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }

    }

    public function destroy($id) {
        try {
            $lista = Lista::findOrFail($id);
            $lista->ativo = false;
            $lista->save();

            Alert::success('Tudo Certo', 'Lista excluída com sucesso');
            return redirect()->route('listas.index');
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }

    }

    function filtroConsulta() {
        try {
            $listas = Lista::where('ativo', true)->get();
            $produtos = Produto::where('ativo', true)->orderBy('nome', 'asc')->get();

            return view('listas.filtroConsulta', compact('listas', 'produtos'));
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }

    }

    function consultar(Request $request, ItemLista $itemLista) {

        try {

            $data = $request->except('_token');
            $item = Produto::where('id', $request->id_produto)->first();
            $quantidade = $itemLista->qtdItens($data);

            return view('listas.itemConsultado', compact('item', 'quantidade'));

        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }

    }

    public function itensIndex($id_lista) {

        try {
            $lista = Lista::findOrFail($id_lista);
            $itens = ItemLista::where('id_lista', $id_lista)->where('ativo', true)->get();

            return view('listas.itens.index', compact('itens', 'lista'));
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }

    public function itensCreate($id_lista)  {

        $lista = Lista::findOrFail($id_lista);
        $produtos = Produto::where('ativo', true)->orderBy('nome', 'asc')->get();

        return view('listas.itens.create', compact('lista','produtos'));
    }

    public function itensStore(Request $request, $id_lista) {
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

    function itensEdit($id_lista, $id_item) {
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

    function itensUpdate(Request $request, $id_lista, $id_item) {
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

    public function itensDestroy($id_lista, $id_item) {
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
