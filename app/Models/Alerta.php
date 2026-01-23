<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Alerta.php
class Alerta extends Model
{
    protected $fillable = [
        'user_id',
        'dispositivo_id', // ← ADICIONAR
        'mensagem',
        'nivel',
        'lido',
        'data_alerta',
    ];

    protected $casts = [
        'lido' => 'boolean',
        'data_alerta' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }
}