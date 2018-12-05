<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    public $timestamps = false;
    protected $table = 'Notificacao';

    protected $primaryKey = 'id';

    protected $fillable = [
        'descricao',
        'users_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
