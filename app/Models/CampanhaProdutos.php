<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampanhaProdutos extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'produto_id',
        'campanha_id',
    ];


    public function produtos()
    {
        return $this->hasMany(Produtos::class,'id')
        ->select('id','nome','desconto');
    }
    public function campanhamembro()
    {
        return $this->belongsTo(Campanhas::class,'id')
        ->select('id','grupo_cidade_id','campanha_nome');
    }
}
