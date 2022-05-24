<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use App\Services\CriadorSerie;
use App\Http\Requests\SeriesFormRequest;
use App\Services\RemovedorDeSerie;

class SeriesController extends Controller
{

    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        //trazer tudo sem ordenar.
        // $series = Serie::all();

        $mensagem = $request->session()->get('mensagem');

        // compact('series) = ['series' => $series];
        return view('series.index', compact('series', 'mensagem'));
    }
    public function create()
    {

        return \view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorSerie $criadorSerie)
    {
        //1 - Inserindo registro sem necessidade de insanciar objeto com todos os dados da request.
        $serie = $criadorSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->qtd_episodios
        );


        $request->session()->flash(
            'mensagem',
            "Serie {$serie->nome} criada com {$request->qtd_temporadas} temporadas
            e {$request->qtd_episodios} episodios."
        );

        //1.2 - passar cada paramatro da requisicao
        // $serie = Serie::create(
        //     compact('nome')
        // );

        return redirect()->route('listar_series');

        //2 - Inserir Registro usando metodo save
        //$serie = new Serie();
        //$serie->nome = $nome;
        //var_dump($serie->save());
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash(
            'mensagem',
            "Serie $nomeSerie removida."
        );

        return redirect(route('listar_series'));
    }
}
