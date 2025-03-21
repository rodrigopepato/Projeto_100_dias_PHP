<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class SeriesController
{
    public function index(Request $request): View {

        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(): View {
        return view('series.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");

        return to_route('series.store');
    }

    public function destroy(Serie $series, Request $request): RedirectResponse
    {
        $series->delete();
        $request->session()->flash('mensagem.sucesso', "A série '{$series->nome}' foi removida com sucesso.");

        return to_route('series.index');
    }
}
