<?php
/**
 * Created by PhpStorm.
 * User: rdoliveira
 * Date: 07/11/2018
 * Time: 15:45
 */

namespace App\PedidoEstados;

interface InterfacePedidoEstado
{
    public function Preparando();
    public function Entregando();
    public function Entregue();
    public function Cancelado();
}