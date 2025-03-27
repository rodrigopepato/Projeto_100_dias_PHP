<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="POST">
    @csrf

    <div class="row mb-3">
        <div class="col-8">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text"
                autofocus
                id="nome"
                name="nome"
                class="form-control">
        </div>

        <div class="col-2">
            <label for="seasonsQty" class="form-label">Nº de Temporadas:</label>
            <input type="text"
                id="seasonsQty"
                name="seasonsQty"
                class="form-control">
        </div>

        <div class="col-2">
            <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
            <input type="text"
                id="episodesPerSeason"
                name="episodesPerSeason"
                class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>

</x-layout>
