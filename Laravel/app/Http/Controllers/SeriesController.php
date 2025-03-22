<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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

    public function store(SeriesFormRequest $request): RedirectResponse
    {
        $serie = Serie::create($request->all());

        return to_route('series.store')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Serie $series): RedirectResponse
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "A série '{$series->nome}' foi removida com sucesso.");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request): RedirectResponse
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' editada com sucesso");
    }
}
