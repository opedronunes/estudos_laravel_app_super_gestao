<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    //Model Item que mapeia a tabela produtos, tem um item detalhe que mapeia a tabela produto_detalhes.
    //E o realcioanamento é: em produto detalhes a fk é produto_id e a pk é o id da tabela produtos.

    protected $table = 'produtos';

    protected $fillable = [
        'nome', 'descricao', 'peso', 'unidade_id'
    ];

    public function itemDetalhe(){
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class);
    }
}
