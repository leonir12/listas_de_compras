<?php

namespace App\Services;

use App\Models\Lista;
use Exception;

class ListaService {

const INATIVO = 0;
const ATIVO = 1;

//Vou ter que criar um método paginate para index e outro get para aparecer no select?
static function getListasPaginate() {
    return $listas = Lista::where('ativo', self::ATIVO)->orderBy('titulo', 'asc')->paginate(15);
}

static function getTodasListas() {
    return $listas = Lista::where('ativo', self::ATIVO)->orderBy('titulo', 'asc')->get();
}

static function findListaAtiva($id) {
    //Verificar se o id é um número e se é diferente de zero
    $lista = Lista::where('id', $id)->where('ativo', self::ATIVO)->first();

    if ($lista) {
        return $lista;
    }

    throw new Exception();

}




}
