<x-layout title="Novo usuário">
    <form method="post">
        @csrf
        <div class="form-group">
            <laber for="name" class="form-laber">Nome</laber>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <laber for="email" class="form-laber">E-mail</laber>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <laber for="password" class="form-laber">Senha</laber>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button class="btn btn-primary mt-3">
            Registrar
        </button>
    </form>
</x-layout>
