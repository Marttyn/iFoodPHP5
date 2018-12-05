<?php

namespace App\Http\Controllers;

use App\Andamento;
use App\Estabelecimento;
use App\Estado;
use App\Pedido;
use App\Produto;
use App\Providers\ProdutoDAO;
use DB;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = \Auth::user()->Pedidos;

        Pedido::setEstado($pedidos);

        return view('Pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estabelecimentos = Estabelecimento::all();
        $produtos = ProdutoDAO::getInstance()->getAll();
        return view('Pedido.create', compact('estabelecimentos', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'estabelecimento' => 'required',
            'combo' => 'required | array',
            'prod' => 'required | array'
        ]);

        $pedido = Pedido::create([
            'data' => now(),
            'codigo' => Pedido::count() + 1,
            'Estabelecimento_id' => request('estabelecimento'),
            'users_id' => \Auth::id()
        ]);

        $pedido->Andamento()->create([
            'Estado_id' => 1,
            'ativo' => 1
        ]);

        $venda = DB::table('Venda')->insertGetId([
            'Pedido_id' => $pedido->id
        ]);

        foreach (request('combo') as $idCombo => $qtd) {
            if ($qtd > 0) {
                $combo = DB::table('Combo')->insertGetId([
                    'descricao' => ProdutoDAO::getInstance()->get($idCombo)->descricao . " + Refrigerante",
                    'Venda_id' => $venda
                ]);

                DB::table('Combo_has_Produto')->insert([
                    'Combo_id' => $combo,
                    'Produto_id' => $idCombo
                ]);
            }
        }

        foreach (request('prod') as $idProduto => $qtd) {
            if ($qtd > 0) {
                DB::table('Venda_has_Produto')->insert([
                    'Venda_id' => $venda,
                    'Produto_id' => $idProduto
                ]);
            }
        }

        return redirect('/pedido');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $estados = Estado::all();
        return view('Pedido.show', compact('pedido', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        Pedido::setEstado([$pedido]);

        $request->validate([
            'andamento' => 'required'
        ]);

        try {
            if (request('rollback')){
                $andamento = Andamento::find(request('andamento'));
                $pedido->rollbackAndamento($andamento);
            } else {
                $andamento = Estado::find(request('andamento'))->nome;
                $pedido->estado = $pedido->estado->$andamento();
                $pedido->setAndamento(request('andamento'));
            }

            return back();
        } catch (\Exception $e) {
            return back()->withErrors("Não é possível realizar esse andamento.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
