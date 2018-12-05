<?php

namespace App;


/**
 * App\CargoSecretaria
 *
 * @mixin \Eloquent
 */
class CargoSecretaria extends Cargo
{
    public function getDescricao()
    {
        return 'Problema resolvido pela Secretaria.';
    }
}
