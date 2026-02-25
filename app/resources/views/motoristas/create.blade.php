<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Motoristas</title>
</head>
<body>
    <h1>Motoristas (ativos)</h1>

    @if (session('success'))
        <p style="color: green;"><strong>{{ session('success') }}</strong></p>
    @endif

    <p>
        <a href="{{ route('motoristas.create') }}">Cadastrar motorista</a>
    </p>

    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($motoristas as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->nome }}</td>
                    <td>{{ $m->ativo ? 'Sim' : 'Não' }}</td>
                    <td>
                        <form method="POST" action="{{ route('motoristas.desativar', $m) }}">
                            @csrf
                            <button type="submit">Desativar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum motorista ativo cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>