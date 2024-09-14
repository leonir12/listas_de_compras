<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\StoreListaRequest;
use App\Http\Requests\UpdateListaRequest;
use App\Models\ItemLista;
use App\Models\Lista;
use App\Models\Produto;
use App\Services\ListaService;
use App\Services\ProdutoService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ListaController extends Controller
{
    public function index(Request $request) {

        try {
            $listas = ListaService::getListasPaginate();
            $dataForm = $request->except('_token');

            return view('listas.index', compact('listas', 'dataForm'));
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }

    public function create()  {
        return view('listas.create');
    }

    public function store(StoreListaRequest $request) {
        try {
            Lista::create($request->validated());
            Alert::success('Tudo Certo', 'Lista cadastrada com sucesso');

            return redirect()->route('listas.index');
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }

    public function edit($id) {
        try {
            $lista = ListaService::findListaAtiva($id);

            return view('listas.edit', compact('lista'));
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }
    }


    public function update(UpdateListaRequest $request, $id) {

        try {
            $lista = ListaService::findListaAtiva($id);
            $lista->update($request->validated());
            Alert::success('Tudo Certo', 'Lista atualizada com sucesso');

            return redirect()->route('listas.index');
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }

    }

    public function destroy($id) {
        try {
            $lista = ListaService::findListaAtiva($id);
            $lista->ativo = ListaService::INATIVO;
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
            $listas = ListaService::getTodasListas();
            $produtos = ProdutoService::getTodosProdutos();

            return view('listas.filtroConsulta', compact('listas', 'produtos'));
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }

    }

    function consultar(ConsultaRequest $request, ItemLista $itemLista) {

        try {
            $data = $request->except('_token');
            $item = ProdutoService::findProdutoAtivo($request->id_produto);
            $quantidade = $itemLista->somarQtdItens($data);

            return view('listas.itemConsultado', compact('item', 'quantidade'));

        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }

    }
}
