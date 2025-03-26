<x-layout title="Editar Série '{!! $serie->nome !!}'">
    <form action="{{ route('series.update', $serie->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col-8">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text"
                autofocus
                id="nome"
                name="nome"
                class="form-control"
                value="{{ old('nome', $serie->nome) }}">
        </div>

        <div class="col-2">
            <label for="seasonsQty" class="form-label">Nº de Temporadas:</label>
            <input type="text"
                id="seasonsQty"
                name="seasonsQty"
                class="form-control"
                value="{{ old('seasonsQty', $serie->seasonsQty) }}">
        </div>

        <div class="col-2">
            <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
            <input type="text"
                id="episodesPerSeason"
                name="episodesPerSeason"
                class="form-control"
                value="{{ old('episodesPerSeason', $serie->episodesPerSeason) }}">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Editar</button>
</form>


</x-layout>
