<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CidadesRequest;
use App\Models\Cidades;
use App\Models\GrupoCidades;
use Illuminate\Http\Request;

class CidadesController extends Controller
{

    public function index()
    {
        return Cidades::all();
    }

    public function store(CidadesRequest $request)
    {
        $grupo = GrupoCidades::find($request->get('id'));
        $novo = new Cidades;
        $novo->nome = $request->nome;
        $novo->grupo_cidade_id = $grupo->id;
        $novo->save();
        
        return 'sucess create';
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'unique:cidades',
            'id' => 'exists:grupo_cidades',
        ]);

        if(Cidades::where('id',$id)->exists()){
            $nova = Cidades::find($id);
            $nova->nome = is_null($request->get('nome')) ? $nova->nome : $request->nome;
            $nova->grupo_cidade_id = is_null($request->get('id')) ? $nova->grupo_cidade_id : $request->id;

            $nova->save();
            return 'sucess update';
        }

        return 'cidade id not found';
        
    }


    public function destroy($id)
    {
        if(Cidades::where('id',$id)->exists()){
            $alvo = Cidades::find($id);
            $alvo->delete();

            return 'sucess delete';
        }
        
        return 'cidade id delete not found';
    }
}
