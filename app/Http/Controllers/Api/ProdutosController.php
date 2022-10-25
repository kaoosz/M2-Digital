<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutosRequest;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function index()
    {
        return Produtos::all();
    }

    public function store(ProdutosRequest $request)
    {
        $novo = new Produtos;
        $novo->nome = $request->nome;
        $novo->desconto = $request->desconto;
        $novo->save();

        return 'sucess create';
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desconto' => 'integer',
            'nome' => 'unique:produtos',
        ]);

        if(Produtos::where('id',$id)->exists())
        {
            $novo = Produtos::find($id);
            $novo->nome = is_null($request->get('nome')) ? $novo->nome : $request->nome;
            $novo->desconto = is_null($request->get('desconto')) ? $novo->desconto : $request->desconto;
            $novo->save();
            
            return 'sucess update';
        }
        return 'produto id update not found';
    }

    public function destroy($id)
    {
        if(Produtos::where('id',$id)->exists()){
            $novo = Produtos::find($id);
            $novo->delete();
            return 'sucess delete';
        }
        return 'produto id delete not found';
    }
}
