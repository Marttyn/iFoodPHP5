<?php

namespace App;

/**
 * App\CargoDono
 *
 * @mixin \Eloquent
 */
class CargoDono extends Cargo
{
    public function getDescricao()
    {
        return 'Problema resolvido pelo Dono.';
    }
}
