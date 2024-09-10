<?php

namespace App\Services;

use App\Models\Produto;
use Exception;

class ProdutoService {

const INATIVO = 0;
const ATIVO = 1;

static function getProdutosPaginate() {
    return $produtos = Produto::where('ativo', self::ATIVO)->orderBy('nome', 'asc')->paginate(15);
}

static function getTodosProdutos() {
    return $produtos = Produto::where('ativo', self::ATIVO)->orderBy('nome', 'asc')->get();
}

static function findProdutoAtivo($id) {

    $produto = Produto::where('id', $id)->where('ativo', self::ATIVO)->first();

    if ($produto) {
        return $produto;
    }

    throw new Exception();

}

}

