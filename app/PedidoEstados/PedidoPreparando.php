<?php
/**
 * Created by PhpStorm.
 * User: rdoliveira
 * Date: 07/11/2018
 * Time: 15:56
 */

namespace App\PedidoEstados;

class PedidoPreparando extends PedidoEstado
{
    public $id = 1;

    public $nome = 'Preparando';

    public function Preparando()
    {
        return new PedidoPreparando();
    }

    public function Entregando()
    {
        return new PedidoEntregando();
    }

    public function Cancelado()
    {
        return new PedidoCancelado();
    }
}