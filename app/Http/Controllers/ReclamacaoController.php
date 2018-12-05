<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\CargoGerente;
use App\CargoSecretaria;
use App\Reclamacao;
use Illuminate\Http\Request;

class ReclamacaoController extends Controller
{
    public function index()
    {
        $reclamacoes = Reclamacao::all();

        return view('Reclamacao.index', compact('reclamacoes'));
    }

    public function create()
    {
        return view('Reclamacao.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'assunto' => 'required',
            'descricao' => 'required | max:500'
        ]);

        $secretaria = CargoSecretaria::find(3);
        $atribuido = $secretaria->resolverReclamacao(request('assunto'));
        if (!is_numeric($atribuido)){
            return back()->withErrors([$atribuido]);
        }

        Reclamacao::create([
            'descricao' => request('descricao'),
            'atribuido' => $atribuido,
            'users_id' => \Auth::id()
        ]);

        return redirect('/reclamacao');
    }
}
