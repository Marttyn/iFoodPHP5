<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'Estado';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome'
    ];

    public function Andamentos()
    {
        return $this->hasMany(Andamento::class);
    }
}
