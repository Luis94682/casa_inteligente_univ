<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $fillable = [
        'user_id',
        'nome',
        'tipo',
        'consumo_base',
        'ativo',
    ];
    protected $casts = [
        'ativo' => 'boolean','ultima_atividade_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consumos()
    {
        return $this->hasMany(Consumo::class);
    }

    public function estaLigado(): bool
{
    return $this->ativo;
}

public function estaDesligado(): bool
{
    return ! $this->ativo;
}
}
