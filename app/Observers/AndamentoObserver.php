<?php

namespace App\Observers;

use App\Andamento;
use App\Mail\AndamentoMail;
use App\User;
use Mail;

class AndamentoObserver
{
    /**
     * Handle the andamento "created" event.
     *
     * @param  \App\Andamento  $andamento
     * @return void
     */
    public function created(Andamento $andamento)
    {
        /** @var User $user */
        $user = $andamento->Pedido->getUsuario;

        $user->Notificacoes()->create([
            'descricao' => 'O pedido ' . $andamento->Pedido->codigo . ' está ' . $andamento->Estado->nome
        ]);

        Mail::to($user)->send(new AndamentoMail($andamento));
    }

    /**
     * Handle the andamento "updated" event.
     *
     * @param  \App\Andamento  $andamento
     * @return void
     */
    public function updated(Andamento $andamento)
    {
        /** @var User $user */
        $user = $andamento->Pedido->getUsuario;

        $user->Notificacoes()->create([
            'descricao' => 'O pedido ' . $andamento->Pedido->codigo . ' está ' . $andamento->Estado->nome
        ]);

        Mail::to($user)->send(new AndamentoMail($andamento));
    }

    /**
     * Handle the andamento "deleted" event.
     *
     * @param  \App\Andamento  $andamento
     * @return void
     */
    public function deleted(Andamento $andamento)
    {
        //
    }

    /**
     * Handle the andamento "restored" event.
     *
     * @param  \App\Andamento  $andamento
     * @return void
     */
    public function restored(Andamento $andamento)
    {
        //
    }

    /**
     * Handle the andamento "force deleted" event.
     *
     * @param  \App\Andamento  $andamento
     * @return void
     */
    public function forceDeleted(Andamento $andamento)
    {
        //
    }
}
