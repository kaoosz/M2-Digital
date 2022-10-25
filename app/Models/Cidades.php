<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'grupo_cidade_id',
    ];  

    public function cidadegrupo()
    {
        return $this->hasOne(GrupoCidades::class,'cidade_id');
    }

    public function pertence()
    {
        return $this->belongsTo(GrupoCidades::class,'cidade_id','id');
    }

}
