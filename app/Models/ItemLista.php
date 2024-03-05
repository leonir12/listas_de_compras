<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLista extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lista', 'id_produto', 'quantidade'
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'item_listas';

    public function lista()
    {
        return $this->belongsTo(Lista::class, 'id_lista');
    }

    public function produto() {
        return $this->belongsTo(Produto::class, 'id_produto');
    }
}
