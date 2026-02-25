<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'pedido_id',
        'pizza_id',
        'tamanho',
        'quantidade',
        'preco_unitario',
        'subtotal',
    ];
}
