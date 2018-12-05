<?php

namespace App;
use App\Providers\ProdutoDAO;
use DB;
use Symfony\Component\Finder\Tests\Iterator\Iterator;

/**
 * App\Combo
 *
 * @mixin \Eloquent
 * @property String descricao
 * @property int $id
 * @property int $Venda_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Combo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Combo whereVendaId($value)
 */
class Combo extends Venda
{
    protected $table = "Combo";
    public $timestamps = false;
    public $primaryKey = "id";

    public $fillable = [
        'Venda_id'
    ];

    public function getProdutos()
    {
        foreach (DB::table('Combo_has_Produto')->where('Combo_id', $this->id)->get() as $produto) {
            $produtos[] = ProdutoDAO::getInstance()->get($produto->Produto_id);
        }

        $produtos = new Collection($produtos);

        return $produtos;
    }

    /**
     * @return String
     */
    public function getDescricao()
	{
        for ($i = $this->getProdutos(); $i->valid(); $i->next()) {
            $descricaoSaida = $i->current()->getDescricao() . " + Refrigerante";
        }

        return $descricaoSaida;
    }
}
