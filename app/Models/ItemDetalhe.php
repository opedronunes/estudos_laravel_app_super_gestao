<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;

    

    protected $table = 'produto_detalhes';

    protected $fillable = [
        'comprimento', 'largura', 'altura', 'produto_id', 'unidade_id'
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'produto_id', 'id');
    }
}
