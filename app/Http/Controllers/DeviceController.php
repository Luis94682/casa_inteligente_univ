<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alerta;
use App\Models\Consumo;

class DeviceController extends Controller
{
/* public function index()
{
    $dispositivos = Dispositivo::where('user_id', Auth::id())
        ->with(['consumos' => function($query) {
            $query->whereDate('medido_em', today());
        }])
        ->orderBy('nome')
        ->get();

    // CÁLCULO REAL (PASSO 1)
    $dispositivos->each(function($dispositivo) {
        $totalConsumo = $dispositivo->consumos->sum('valor');
        
        if ($dispositivo->consumos->isNotEmpty()) {
            $unidade = $dispositivo->consumos->first()->unidade ?? 'kWh';
            if ($unidade === 'W' || $unidade === 'Wh') {
                $totalConsumo = $totalConsumo / 1000;
            }
        }
        
        $dispositivo->consumo_hoje = $totalConsumo;
        
        if ($dispositivo->consumo_base > 0 && $totalConsumo > 0) {
            $dispositivo->tempo_ligado = ($totalConsumo * 1000) / $dispositivo->consumo_base;
        } else {
            $dispositivo->tempo_ligado = 0;
        }
    });

    // DADOS DE EXEMPLO (APENAS SE NÃO HOUVER DADOS REAIS) - COLOQUE AQUI
    if ($dispositivos->first() && $dispositivos->first()->consumos->isEmpty()) {
        $dispositivos->each(function($dispositivo) {
            if ($dispositivo->ativo) {
                $dispositivo->consumo_hoje = rand(50, 200) / 100; // 0.5 a 2.0 kWh
                $dispositivo->tempo_ligado = rand(20, 100) / 10; // 2.0 a 10.0 horas
            }
        });
    }
    // FIM DOS DADOS DE EXEMPLO

    $totalDispositivos = $dispositivos->count();
    $ligados = $dispositivos->where('ativo', 1)->count();
    $desligados = $dispositivos->where('ativo', 0)->count();

    return view('viewDash.dispositivo', compact('dispositivos', 'totalDispositivos', 'ligados', 'desligados'));
} */

    public function index()
{
    $dispositivos = Dispositivo::where('user_id', Auth::id())
        ->with(['consumos' => function($query) {
            $query->whereDate('medido_em', today());
        }])
        ->orderBy('nome')
        ->get();

    // Calcular consumo e tempo REAL
    $dispositivos->each(function($dispositivo) {
        // 1. CONSUMO DE HOJE (mantém seu código)
        $totalConsumo = $dispositivo->consumos->sum('valor');
        
        if ($dispositivo->consumos->isNotEmpty()) {
            $unidade = $dispositivo->consumos->first()->unidade ?? 'kWh';
            if ($unidade === 'W' || $unidade === 'Wh') {
                $totalConsumo = $totalConsumo / 1000;
            }
        }
        
        $dispositivo->consumo_hoje = $totalConsumo;
        
        // 2. TEMPO LIGADO HOJE - CÁLCULO REAL
        if ($dispositivo->ativo && $dispositivo->last_ligado_at) {
            // Se está ligado AGORA, calcula desde last_ligado_at
            $horasLigado = $dispositivo->last_ligado_at->diffInHours(now(), true);
            
            // Se foi ligado antes de hoje, conta só a partir da 00:00
            if (!$dispositivo->last_ligado_at->isToday()) {
                $inicioDoDia = now()->startOfDay();
                $horasLigado = $inicioDoDia->diffInHours(now(), true);
            }
        } else {
            $horasLigado = 0;
        }
        
        $dispositivo->tempo_ligado = round($horasLigado, 1);
        
        // 3. SE NÃO TEM CONSUMO REGISTRADO, ESTIMA BASEADO NO TEMPO
        if ($dispositivo->consumo_hoje == 0 && $dispositivo->ativo && $dispositivo->consumo_base > 0) {
            // Consumo estimado = potência × tempo
            $dispositivo->consumo_hoje = ($dispositivo->consumo_base * $horasLigado) / 1000;
        }
    });

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

/* public function toggle(Request $request, Dispositivo $dispositivo)
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
}   */ 


 /*  public function toggle(Request $request, Dispositivo $dispositivo)
{
    if ($dispositivo->user_id !== Auth::id()) {
        return response()->json(['success' => false, 'message' => 'Acesso negado'], 403);
    }

    $novoEstado = !$dispositivo->ativo;
    $dispositivo->update(['ativo' => $novoEstado]);

    // ALERTA DE LIGAR/DESLIGAR
    if ($novoEstado === true) {
        Alerta::create([
            'user_id' => Auth::id(),
            'mensagem' => "Dispositivo '{$dispositivo->nome}' foi ligado - Potência: {$dispositivo->consumo_base}W",
            'nivel' => 'info',
            'lido' => false,
            'data_alerta' => now(),
        ]);
        
        // VERIFICAR POTÊNCIA TOTAL
        $potenciaTotal = Dispositivo::where('user_id', Auth::id())
            ->where('ativo', true)
            ->sum('consumo_base');
        
        // ALERTA CRÍTICO SE > 1000W
        if ($potenciaTotal > 1000) {
            Alerta::create([
                'user_id' => Auth::id(),
                'mensagem' => "⚠️ ATENÇÃO! Potência total: {$potenciaTotal}W (excede 1000W)",
                'nivel' => 'danger', // <- AGORA USA 'danger'
                'lido' => false,
                'data_alerta' => now(),
            ]);
        }
    } else {
        // Alerta de desligar (opcional)
        Alerta::create([
            'user_id' => Auth::id(),
            'mensagem' => "Dispositivo '{$dispositivo->nome}' foi desligado",
            'nivel' => 'info',
            'lido' => false,
            'data_alerta' => now(),
        ]);
    }

    return response()->json([
        'success' => true,
        'ativo' => $novoEstado,
        'message' => $novoEstado ? 'Dispositivo ligado!' : 'Dispositivo desligado!'
    ]);
} */


    public function toggle(Request $request, Dispositivo $dispositivo)
{
    if ($dispositivo->user_id !== Auth::id()) {
        return response()->json(['success' => false, 'message' => 'Acesso negado'], 403);
    }

    $novoEstado = !$dispositivo->ativo;
    $dispositivo->update(['ativo' => $novoEstado]);

    // Verifica se já existe alerta recente (últimas 24h) para evitar repetição
    $ultimoAlerta = Alerta::where('dispositivo_id', $dispositivo->id)
        ->where('user_id', Auth::id())
        ->where('created_at', '>=', now()->subHours(24))
        ->latest()
        ->first();

    if ($novoEstado === true) {
    // Alerta de ligado (sem expiração, ou com expiração longa se quiseres)
    if (!$ultimoAlerta || str_contains($ultimoAlerta->mensagem, 'foi desligado')) {
        Alerta::create([
            'user_id'        => Auth::id(),
            'dispositivo_id' => $dispositivo->id,
            'mensagem'       => "Dispositivo '{$dispositivo->nome}' foi ligado - Potência base: {$dispositivo->consumo_base}W",
            'nivel'          => 'info',
            'lido'           => false,
            'expires_at'     => null, // sem expiração
        ]);
    }
} else {
    // Alerta de desligado com expiração de 1 minuto
    Alerta::create([
        'user_id'        => Auth::id(),
        'dispositivo_id' => $dispositivo->id,
        'mensagem'       => "Dispositivo '{$dispositivo->nome}' foi desligado",
        'nivel'          => 'info',
        'lido'           => false,
        'expires_at'     => now()->addMinute(), // expira em 1 minuto
    ]);
}

    return response()->json([
        'success' => true,
        'ativo'   => $novoEstado,
        'message' => $novoEstado ? 'Dispositivo ligado!' : 'Dispositivo desligado!'
    ]);
}


public function monitoramento(){
     $dispositivos = Dispositivo::where('user_id', Auth::id())
        ->orderBy('nome')
        ->get();

    // Contagens
    $totalDispositivos = $dispositivos->count();
    $ligados = $dispositivos->where('ativo', 1)->count();
    $desligados = $dispositivos->where('ativo', 0)->count();

    return view('viewDash.monitorizacao', compact('dispositivos', 'totalDispositivos', 'ligados', 'desligados'));
  
}

// DeviceController.php - adicione este método
public function gerarConsumosTeste()
{
    $dispositivos = Dispositivo::where('user_id', Auth::id())->get();
    
    foreach ($dispositivos as $dispositivo) {
        // Apaga consumos antigos de hoje
        Consumo::where('dispositivo_id', $dispositivo->id)
               ->whereDate('medido_em', today())
               ->delete();
        
        // Gera 8 horas de consumo (das 8:00 às 16:00)
        for ($hora = 8; $hora <= 16; $hora++) {
            $horaAtual = now()->setTime($hora, 0, 0);
            
            // Se dispositivo está ativo, gera consumo
            if ($dispositivo->ativo) {
                $consumoKwh = ($dispositivo->consumo_base * 1) / 1000; // 1 hora
                
                Consumo::create([
                    'dispositivo_id' => $dispositivo->id,
                    'user_id' => $dispositivo->user_id,
                    'valor' => $consumoKwh,
                    'unidade' => 'kWh',
                    'medido_em' => $horaAtual
                ]);
            }
        }
    }
    
    return redirect()->route('devices.index')
        ->with('success', 'Dados de consumo gerados para hoje!');
}
  
}