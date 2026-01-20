<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alerta;

class DeviceController extends Controller
{
    public function index() // ou dashboard()
{
    $dispositivos = Dispositivo::where('user_id', Auth::id())
        ->orderBy('nome')
        ->get();

    // Contagens
    $totalDispositivos = $dispositivos->count();
    $ligados = $dispositivos->where('ativo', 1)->count();
    $desligados = $dispositivos->where('ativo', 0)->count();

    return view('viewDash.dispositivo', compact('dispositivos', 'totalDispositivos', 'ligados', 'desligados'));
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'         => 'required|string|max:100',
            'tipo'         => 'required|string|max:50',
            'consumo_base' => 'required|numeric|min:1',
            'ativo'        => 'boolean',
        ]);

        Dispositivo::create([
            'user_id'      => Auth::id(),
            'nome'         => $validated['nome'],
            'tipo'         => $validated['tipo'],
            'consumo_base' => $validated['consumo_base'],
            'ativo'        => $request->ativo ?? false,
        ]);

        return redirect()->route('devices.index')
            ->with('success', 'Dispositivo adicionado com sucesso!');
    }

 /*    public function toggle(Request $request, Dispositivo $dispositivo)
{
   
    if ($dispositivo->user_id !== Auth::id()) {
        return response()->json([
            'success' => false,
            'message' => 'Acesso negado. Este dispositivo não pertence a ti.'
        ], 403);
    }

   
    $novoEstado = !$dispositivo->ativo;

    $dispositivo->update(['ativo' => $novoEstado]);

    return response()->json([
        'success' => true,
        'ativo'   => $novoEstado,
        'message' => $novoEstado ? 'Dispositivo ligado!' : 'Dispositivo desligado!'
    ]);
}
 */

public function toggle(Request $request, Dispositivo $dispositivo)
{
    if ($dispositivo->user_id !== Auth::id()) {
        return response()->json(['success' => false, 'message' => 'Acesso negado'], 403);
    }

    $novoEstado = !$dispositivo->ativo;
    $dispositivo->update(['ativo' => $novoEstado]);

    // Cria alerta APENAS quando LIGA o dispositivo
    if ($novoEstado === true) {
        Alerta::create([
            'user_id'  => Auth::id(),
            'mensagem' => "Dispositivo '{$dispositivo->nome}' foi ligado - Potência base: {$dispositivo->consumo_base}W",
            'nivel'    => 'info',  // ou 'aviso' se quiseres destacar mais
            'lido'     => false,
        ]);
    }

    return response()->json([
        'success' => true,
        'ativo'   => $novoEstado,
        'message' => $novoEstado ? 'Dispositivo ligado!' : 'Dispositivo desligado!'
    ]);
}   
  
}