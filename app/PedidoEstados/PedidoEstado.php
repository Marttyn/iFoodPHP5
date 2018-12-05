<?php
/**
 * Created by PhpStorm.
 * User: rdoliveira
 * Date: 07/11/2018
 * Time: 15:50
 */

namespace App\PedidoEstados;

use App\Exceptions\IllegalStateTransitionException;

class PedidoEstado implements InterfacePedidoEstado {

    public function Preparando()
    {
        throw new IllegalStateTransitionException();
    }

    public function Entregando()
    {
        throw new IllegalStateTransitionException();
    }

    public function Entregue()
    {
        throw new IllegalStateTransitionException();
    }

    public function Cancelado()
    {
        throw new IllegalStateTransitionException();
    }
}