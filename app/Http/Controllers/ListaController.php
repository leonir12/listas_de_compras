<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ListaController extends Controller
{
    public function index() {

        try {
            $listas = Lista::where('ativo', true)->orderBy('titulo', 'asc')->get();

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

}
