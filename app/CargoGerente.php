<?php

namespace App;

/**
 * App\CargoGerente
 *
 * @mixin \Eloquent
 */
class CargoGerente extends Cargo
{
    public function getDescricao()
    {
        return 'Problema resolvido pelo Gerente.';
    }
}
