<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    protected $fillable = [
        'dispositivo_id',
        'user_id',
        'valor',
        'unidade',
        'medido_em'
    ];

    protected $casts = [
        'medido_em' => 'datetime',
        'valor' => 'float'
    ];

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}