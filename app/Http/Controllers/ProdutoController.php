<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $produtos = ProdutoService::getProdutosPaginate();
            $dataForm = $request->except('_token');

            return view('produtos.index', compact('produtos', 'dataForm'));

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
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdutoRequest $request)
    {
        try {
            Produto::create($request->validated());
            Alert::success('Tudo Certo', 'Produto cadastrado com sucesso');

            return redirect()->route('produtos.index');

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
    public function edit(Request $request, $id)
    {
        try {

            $produto = ProdutoService::findProdutoAtivo($id);

            return view('produtos.edit', compact('produto'));
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
    public function update(UpdateProdutoRequest $request, $id)
    {
        try {
            $produto = ProdutoService::findProdutoAtivo($id);
            $produto->update($request->validated());
            Alert::success('Tudo Certo', 'Produto atualizado com sucesso');

            return redirect()->route('produtos.index');
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
    public function destroy($id)
    {
        try {
            $produto = ProdutoService::findProdutoAtivo($id);
            $produto->ativo = ProdutoService::INATIVO;
            $produto->save();

            Alert::success('Tudo Certo', 'Produto excluído com sucesso');
            return redirect()->route('produtos.index');
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }

    }
}
