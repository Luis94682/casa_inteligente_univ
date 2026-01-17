<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function consumos()
{
    return $this->hasMany(Consumo::class);
}
}
