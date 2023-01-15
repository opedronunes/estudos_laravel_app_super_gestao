<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos(){
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id');

        /**
         * 1 - Modelo do relacionamento NxN em relação ao Modelo que estamos implementando
         * 2 - É a tabela auxliar que armazena os registros de relacionamento
         * 3 - repesenta o nome da FK da tabale mapeada pelo modelo na teabla de racionamento
         * 4 - Representa o nome da Fk da tabela mapeada pele model utilizado no relacionamento que estaos implementando
         */
    }
}
