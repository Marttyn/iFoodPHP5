<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Andamento extends Model
{
    protected $table = "Andamento";
    public $primaryKey = "id";

    public $fillable = [
        'pedido_id',
        'estado_id',
        'ativo'
    ];


    public function Estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function Pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
