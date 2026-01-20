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
        'ativo' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consumos()
    {
        return $this->hasMany(Consumo::class);
    }
}
