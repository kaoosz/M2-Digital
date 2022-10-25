<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Casts\Attribute;


class GrupoCidades extends Model
{
    use HasFactory;


    protected $fillable = [
        'grupo_nomes',
    ];



    public function cidades()
    {
        return $this->belongsTo(Cidades::class,'id');
    }
    //// \/  /// 

    public function city()
    {
        return $this->hasMany(Cidades::class,'grupo_cidade_id','id')
        ->select('id','nome','grupo_cidade_id');
    }

}
