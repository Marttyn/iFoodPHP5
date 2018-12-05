<?php

namespace App\Providers;

use App\HamburguerProduto;
use App\PizzaProduto;
use Illuminate\Http\Request;

class ProdutoDAO
{
    public static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProdutoDAO;
        }
 
        return self::$instance;
    }

    /**
     * @param $id
     * @return HamburguerProduto|PizzaProduto|null
     */
    public function get($id)
    {
        $produto = PizzaProduto::find($id);
        if (!$produto){
            $produto = HamburguerProduto::find($id);
        }

        return $produto;
    }

    public function getAll()
    {
        $produtos["Pizzas"] = PizzaProduto::where('TipoProduto_id', 1)->get();
        $produtos["Hamburgues"] = HamburguerProduto::where('TipoProduto_id', 2)->get();

        return $produtos;
    }

    public function save(Request $request)
    {
        $tipo = 'App\\'.request('tipo').'Produto';
        $produto = new $tipo();
        $produto->setDescricao(request('descricao'))->setPreco(request('preco'));
        $produto->save();
    }
}
