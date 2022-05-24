<?php

namespace App\Services;

use App\Serie;

class CriadorSerie
{

    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $qtdEpisodios): Serie
    {
        $serie = Serie::create(['nome' => $nomeSerie]);

        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($z = 1; $z <= $qtdEpisodios; $z++) {
                $temporada->episodios()->create(['numero' => $z]);
            }
        }
        return $serie;
    }
}
