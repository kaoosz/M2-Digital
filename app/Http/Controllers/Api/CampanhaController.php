<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampanhaRequest;
use App\Http\Resources\CampanhasResource;
use App\Models\Campanhas;
use App\Models\GrupoCidades;
use Illuminate\Http\Request;

class CampanhaController extends Controller
{

    public function index()
    {        
        return CampanhasResource::collection(Campanhas::all());
    }

    public function store(CampanhaRequest $request)
    {
        $gru = GrupoCidades::find($request->grupo_cidade_id);
        
        $cam = new Campanhas;
        $cam->campanha_nome = $request->campanha_nome;
        $cam->grupo_cidade_id = $gru->id;
        $cam->save();
        
        return 'sucess create';
    }

    public function update(Request $request, $id)
    {  
        $request->validate([
            'campanha_nome' => 'unique:campanhas', 
            'grupo_cidade_id' => 'unique:campanhas,grupo_cidade_id|exists:grupo_cidades,id'
        ]);

        if(Campanhas::where('id',$id)->exists()){

            $novo = Campanhas::find($id);
            $novo->campanha_nome = is_null($request->get('campanha_nome')) ? $novo->campanha_nome : $request->campanha_nome;
            $novo->grupo_cidade_id = is_null($request->get('grupo_cidade_id')) ? $novo->grupo_cidade_id : $request->grupo_cidade_id;
            $novo->save();

            return 'sucess update';
        }
        return 'campanha id update not found';
    }

    public function destroy($id)
    {
        if(Campanhas::where('id',$id)->exists()){

            $novo = Campanhas::find($id);
            $novo->delete();

            return 'Campanha Deletada';
        }
        return 'campanha id delete not found';
    }
}
