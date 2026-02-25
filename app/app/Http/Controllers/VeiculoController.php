<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::where('ativo', true)
            ->orderBy('id')
            ->get();

        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        return view('veiculos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'descricao' => ['required', 'string', 'min:2'],
            'placa' => ['nullable', 'string', 'min:3'],
        ]);

        Veiculo::create([
            'descricao' => $dados['descricao'],
            'placa' => $dados['placa'] ?? null,
            'ativo' => true,
        ]);

        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veículo cadastrado com sucesso!');
    }

    public function desativar(Veiculo $veiculo)
    {
        $veiculo->ativo = false;
        $veiculo->save();

        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veículo desativado!');
    }
}