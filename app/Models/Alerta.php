<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    protected $fillable = [
        'user_id',
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
}