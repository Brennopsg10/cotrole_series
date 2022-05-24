<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// protected $table = series; deifine a tabela a ser manipulada, o Eloquente faz de modo automatico
class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function temporadas()
    {
        //tem muitas temporada
        return $this->hasMany(Temporada::class);
    }
}
