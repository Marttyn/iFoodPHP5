<?php
/**
 * Created by PhpStorm.
 * User: rdoliveira
 * Date: 07/11/2018
 * Time: 15:56
 */

namespace App\PedidoEstados;

class PedidoCancelado extends PedidoEstado
{
    public $id = 4;

    public $nome = 'Cancelado';

    public function Cancelado()
    {
        return new PedidoCancelado();
    }
}