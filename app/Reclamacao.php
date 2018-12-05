<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reclamacao extends Model
{
    public $timestamps = false;

    protected $table = 'Reclamacao';

    protected $primaryKey = 'id';

    protected $fillable = [
        'descricao',
        'users_id',
        'atribuido'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Atribuido()
    {
        return DB::select('select * from Cargo where id = ?', [$this->atribuido]);
    }
}
