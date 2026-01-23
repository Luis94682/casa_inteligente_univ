<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlertaController extends Controller
{
   public function index(Request $request)
{
    $alertas = Alerta::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

    // Se a requisição é AJAX/JSON, retorna JSON
    if ($request->expectsJson() || $request->ajax()) {
        return response()->json($alertas);
    }

    // Se não, retorna a view normal
    return view('ViewDash.alert', compact('alertas'));
}

    public function marcarLido(Alerta $alerta)
    {
        if ($alerta->user_id !== Auth::id()) {
            return response()->json(['success' => false], 403);
        }

        $alerta->update(['lido' => true]);

        return response()->json(['success' => true]);
    }

    public function countNaoLidos()
    {
        $count = Alerta::where('user_id', Auth::id())
            ->where('lido', false)
            ->count();

        return response()->json(['count' => $count]);
    }


    public function destroy(Alerta $alerta)
{
    if ($alerta->user_id !== Auth::id()) {
        return response()->json(['success' => false], 403);
    }

    $alerta->delete();

    return response()->json(['success' => true]);
}
}