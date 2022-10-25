<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GruposRequest;
use App\Http\Resources\GrupoResource;
use App\Models\Cidades;
use App\Models\GrupoCidades;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;


class GruposController extends Controller
{
    public function index()
    {
        return GrupoResource::collection(GrupoCidades::all());
    }

    public function store(GruposRequest $request)
    {

        $novo = new GrupoCidades;
        $novo->grupo_nomes = is_null($request->get('grupo_nomes')) ? $novo->grupo_nomes : $request->grupo_nomes;
        $novo->save();

        return 'sucess create';
    }

    public function update(GruposRequest $request, $id)
    {
        
        if(GrupoCidades::where('id',$id)->exists())
        {
            $novo = GrupoCidades::find($id);
            $novo->grupo_nomes = is_null($request->get('grupo_nomes')) ? $novo->grupo_nomes : $request->grupo_nomes;
            $novo->update();
            return 'sucess update';
        }
        return 'grupo cidades id update not found';
    }

    public function destroy($id)
    {
        if(GrupoCidades::where('id', $id)->exists())
        {
            $novo = GrupoCidades::find($id);
            $novo->delete();
            return 'Sucess Delete';
        }
        return 'grupo cidade id delete not found';

    }
}
