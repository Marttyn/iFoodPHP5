<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    protected $table = 'TipoProduto';
    
    protected $primaryKey = 'id';

    public function Produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
