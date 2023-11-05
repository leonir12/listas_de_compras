<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $produtos = Produto::where('ativo', true)->orderBy('nome', 'asc')->get();

            return view('produtos.index', compact('produtos'));

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
    public function store(Request $request)
    {
        try {
            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->ativo = true;
            $produto->save();

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

            $produto = Produto::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            $produto->nome = $request->nome;
            $produto->save();

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
            $produto = Produto::findOrFail($id);
            $produto->ativo = false;
            $produto->save();

            Alert::success('Tudo Certo', 'Produto excluído com sucesso');
            return redirect()->route('produtos.index');
        } catch (\Exception $e) {
            Alert::error('Erro', 'Ocorreu um erro');
            return redirect()->back();
        }

    }
}
