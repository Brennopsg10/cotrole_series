<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\{Serie, Episodio, Temporada};


class RemovedorDeSerie
{
    public function removerSerie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction(function () use ($serieId, &$nomeSerie) {

            $serie =  Serie::find($serieId);

            $this->removerTemporadas($serie);
            $serie->delete();
        });


        return $nomeSerie;
    }

    private function removerTemporadas(Serie $serie)
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodeos($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodeos(Temporada $temporada)
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
