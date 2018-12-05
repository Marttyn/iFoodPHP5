<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class Cargo extends Model
{
    protected $primaryKey = "id";
    protected $table = "Cargo";

    protected $fillable = [
        'nome',
        'superior'
    ];

    abstract public function getDescricao();

    public function getUsuarios()
    {
        return $this->hasMany(User::class);
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function setSuperior($superior)
    {
        $this->superior = $superior;
        return $this;
    }

    public function getSuperior()
    {
        return Cargo::find($this->superior);
    }

    public function resolverReclamacao($cargo)
    {
        if ($this->id == $cargo) {
            return $this->id;
        } else {
            if ($this->superior != null) {
                return $this->getSuperior()->resolverReclamacao($cargo);
            } else {
                return "Não existe cargo habilitado a resolver essa reclamação no momento.";
            }
        }
    }
}
