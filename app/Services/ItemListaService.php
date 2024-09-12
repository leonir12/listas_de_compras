<?php

namespace App\Services;

use App\Models\ItemLista;
use Exception;

class ItemListaService {

const INATIVO = 0;
const ATIVO = 1;

static function getItens($id_lista) {
    return $itens = ItemLista::join('produtos', 'produtos.id', '=', 'item_listas.id_produto')
        ->join('listas', 'listas.id', '=', 'item_listas.id_lista')
        ->where('id_lista', $id_lista)
        ->where('item_listas.ativo', self::ATIVO)
        ->select('item_listas.*')
        ->orderBy('produtos.nome', 'asc')
        ->paginate(15);
}

static function findItemAtivo($id) {
    //Verificar se o id é um número e se é diferente de zero
    $item = ItemLista::where('id', $id)->where('ativo', self::ATIVO)->first();

    if ($item) {
        return $item;
    }

    throw new Exception();
}

}
