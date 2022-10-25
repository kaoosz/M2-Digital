<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campanhas extends Model
{
    use HasFactory;

    protected $fillable = [
        'campanha_nome',
        'grupo_cidade_id',
    ];

    public function gruposcidades()
    {
        return $this->belongsTo(GrupoCidades::class,'id');
    }

    public function campanhaprodutos()
    {
        return $this->hasMany(CampanhaProdutos::class,'campanha_id');
    }
    
}
