<?php

namespace App;

class HamburguerProduto extends Produto
{
    protected $table = "Produto";
    public $timestamps = false;
    public $primaryKey = "id";

    public $fillable = [
        'preco',
        'Venda_id'
    ];

    public function __construct()
    {
        parent::__construct(2);
    }

    public function getIngredientes(){
		return "Carne";
	}
}
