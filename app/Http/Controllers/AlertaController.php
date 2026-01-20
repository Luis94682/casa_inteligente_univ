<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlertaController extends Controller
{
    public function index()
    {
        $alertas = Alerta::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

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
}