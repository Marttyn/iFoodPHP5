<?php
/**
 * Created by PhpStorm.
 * User: rdoliveira
 * Date: 07/11/2018
 * Time: 15:56
 */

namespace App\PedidoEstados;

class PedidoEntregue extends PedidoEstado
{
    public $id = 3;

    public $nome = 'Entregue';

    public function Entregue()
    {
        return new PedidoEntregue();
    }

    public function Cancelado()
    {
        return new PedidoCancelado();
    }
}