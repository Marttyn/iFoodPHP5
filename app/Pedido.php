<?php

namespace App;

use App\Providers\ProdutoDAO;
use DB;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Pedido
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $codigo
 * @property int $Estabelecimento_id
 * @property int $users_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pedido whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pedido whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pedido whereEstabelecimentoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pedido whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pedido whereUsersId($value)
 * @mixin \Eloquent
 */
class Pedido extends Model
{
    protected $table = "Pedido";
    public $timestamps = false;
    public $primaryKey = "id";
    protected $dates = ['data'];

    public $fillable = [
        'data',
        'codigo',
        'Estabelecimento_id',
        'users_id'
    ];

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function setEstabelecimento($estabelecimento)
    {
        $this->Estabelecimento_id = $estabelecimento;
        return $this;
    }

    public function setUsuario($usuario)
    {
        $this->users_id = $usuario;
        return $this;
    }

    public function getEstabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class, 'Estabelecimento_id');
    }

    public function getUsuario()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    static public function setEstado($pedidos)
    {
        foreach ($pedidos as $pedido) {
            $estado = 'App\PedidoEstados\Pedido' . $pedido->Andamentos()->where('ativo', 1)->first()->Estado->nome;
            $pedido->estado = new $estado;
        }
    }

    public function getEstadoNome()
    {
        return $this->Andamentos()->where('ativo', 1)->first()->Estado->nome;
    }

    public function getVenda()
    {
        $venda = DB::table('Venda')->where('pedido_id', $this->id)->first();

        $combos = Combo::where('Venda_id', $venda->id)->get();

        $vendaProdutos = DB::table('Venda_has_Produto')->where('Venda_id', $venda->id)->get();

        $produtos = collect();

        foreach ($vendaProdutos as $value){
            $produtos->push(ProdutoDAO::getInstance()->get($value->Produto_id));
        }

        $venda = [];
        $venda['Combos'] = $combos;
        $venda['Produtos'] = $produtos;

        return $venda;
    }

    public function Andamentos()
    {
        return $this->hasMany(Andamento::class);
    }

    public function setAndamento($estado)
    {
        Andamento::where('pedido_id', $this->id)
            ->where('id', '>', $this->Andamentos()->where('ativo', 1)->first()->id)
            ->delete();

        Andamento::where('pedido_id', $this->id)->update([
            'ativo' => 0
        ]);

        $this->Andamentos()->create([
            'estado_id' => $estado,
            'ativo' => 1
        ]);
    }

    public function rollbackAndamento(Andamento $andamento)
    {
        Andamento::where('pedido_id', $this->id)->update([
            'ativo' => 0
        ]);

        $andamento->ativo = 1;
        $andamento->save();
    }
}
