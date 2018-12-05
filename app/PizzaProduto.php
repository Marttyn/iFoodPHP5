<?php

namespace App;

class PizzaProduto extends Produto
{
    protected $table = "Produto";
    public $timestamps = false;
    public $primaryKey = "id";

    public $fillable = [
        'preco',
        'Venda_id',
        'TipoProduto_id'
    ];

    public function __construct()
    {
        parent::__construct(1);
    }

    public function getIngredientes(){
		return "Calabresa";
	}
}
