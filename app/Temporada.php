<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

    public function episodios()
    {
        //tem muitos
        return $this->hasMany(Episodio::class);
    }

    public function serie()
    {
        //pertence a uma serie
        return $this->belongsTo(Serie::class);
    }
}
