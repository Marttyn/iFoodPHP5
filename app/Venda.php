<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class Venda extends Model
{
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    abstract public function getDescricao();

}
