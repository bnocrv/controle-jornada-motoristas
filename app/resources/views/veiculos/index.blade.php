<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Veículos</title>
</head>
<body>
    <h1>Veículos (ativos)</h1>

    @if (session('success'))
        <p style="color: green;"><strong>{{ session('success') }}</strong></p>
    @endif

    <p>
        <a href="{{ route('veiculos.create') }}">Cadastrar veículo</a>
    </p>

    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Placa</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($veiculos as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->descricao }}</td>
                    <td>{{ $v->placa ?? '-' }}</td>
                    <td>{{ $v->ativo ? 'Sim' : 'Não' }}</td>
                    <td>
                        <form method="POST" action="{{ route('veiculos.desativar', $v) }}">
                            @csrf
                            <button type="submit">Desativar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum veículo ativo cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p><a href="{{ route('motoristas.index') }}">Ir para Motoristas</a></p>
</body>
</html>