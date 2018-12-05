<?php

namespace App;

abstract class Produto extends Venda
{
    /**
     * Produto constructor.
     * @param $tipo
     */
    public function __construct($tipo)
    {
        parent::__construct();
        $this->TipoProduto_id = $tipo;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
        return $this;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    abstract public function getIngredientes();
	
	public function getDescricaoCompleta() {
		return "Preco: " . $this->getPreco() . ", Descrição: " . $this->getDescricao() . ", Ingredientes: " . $this->getIngredientes();
	}

    public function Tipo()
    {
        return $this->belongsTo(TipoProduto::class);
	}
}
