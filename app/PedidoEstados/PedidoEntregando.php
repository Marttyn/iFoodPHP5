<?php
/**
 * Created by PhpStorm.
 * User: rdoliveira
 * Date: 07/11/2018
 * Time: 15:56
 */

namespace App\PedidoEstados;

class PedidoEntregando extends PedidoEstado
{
    public $id = 2;

    public $nome = 'Entregando';

    public function Entregue()
    {
        return new PedidoEntregue();
    }

    public function Cancelado()
    {
        return new PedidoCancelado();
    }

    public function Preparando()
    {
        return new PedidoPreparando();
    }
}