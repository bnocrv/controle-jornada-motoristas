<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Cadastrar veículo</title>
</head>
<body>
    <h1>Cadastrar veículo</h1>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Erros:</strong>
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('veiculos.store') }}">
        @csrf

        <p>
            <label>
                Descrição:
                <input type="text" name="descricao" value="{{ old('descricao') }}">
            </label>
        </p>

        <p>
            <label>
                Placa (opcional):
                <input type="text" name="placa" value="{{ old('placa') }}">
            </label>
        </p>

        <button type="submit">Salvar</button>
    </form>

    <p><a href="{{ route('veiculos.index') }}">Voltar</a></p>
</body>
</html>