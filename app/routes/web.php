<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotoristaController;

// Raiz do site -> manda para a lista de motoristas
Route::get('/', fn () => redirect()->route('motoristas.index'));

// Motoristas
Route::get('/motoristas', [MotoristaController::class, 'index'])->name('motoristas.index');
Route::get('/motoristas/criar', [MotoristaController::class, 'create'])->name('motoristas.create');
Route::post('/motoristas', [MotoristaController::class, 'store'])->name('motoristas.store');

// "Delete lógico" (desativar)
Route::post('/motoristas/{motorista}/desativar', [MotoristaController::class, 'desativar'])
    ->name('motoristas.desativar');

    use App\Http\Controllers\VeiculoController;

Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');
Route::get('/veiculos/criar', [VeiculoController::class, 'create'])->name('veiculos.create');
Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');

Route::post('/veiculos/{veiculo}/desativar', [VeiculoController::class, 'desativar'])
    ->name('veiculos.desativar');