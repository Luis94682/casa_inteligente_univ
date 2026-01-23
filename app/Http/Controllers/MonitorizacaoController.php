<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dispositivo;

class MonitorizacaoController extends Controller
{
    //
    public function stats()
{
    $userId = Auth::id();

    $ligados = Dispositivo::where('user_id', $userId)
        ->where('ativo', true)
        ->count();

    $desligados = Dispositivo::where('user_id', $userId)
        ->where('ativo', false)
        ->count();

    $total = Dispositivo::where('user_id', $userId)->count();

    return response()->json([
        'ligados' => $ligados,
        'desligados' => $desligados,
        'total' => $total,
    ]);
}

public function consumoPorDispositivo()
{
    $userId = Auth::id();

    $dispositivos = Dispositivo::where('user_id', $userId)
        ->with('consumos') // garante relação
        ->get();

    // Prepara JSON para o gráfico
    $labels = [];
    $data = [];

    foreach ($dispositivos as $disp) {
        $labels[] = $disp->nome;
        // soma do consumo ou último valor
        $totalConsumo = $disp->consumos->sum('valor'); 
        $data[] = $totalConsumo;
    }

    return response()->json([
        'labels' => $labels,
        'data' => $data,
    ]);
}

}
