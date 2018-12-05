<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Estabelecimento
 *
 * @property int $id
 * @property string $nome
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estabelecimento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estabelecimento whereNome($value)
 * @mixin \Eloquent
 */
class Estabelecimento extends Model
{
    protected $table = "Estabelecimento";
    public $timestamps = false;
    public $primaryKey = "id";

    public $fillable = [
        'nome'
    ];
}
