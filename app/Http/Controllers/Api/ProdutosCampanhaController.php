<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutosCampanhaRequest;
use App\Http\Resources\ProdutosCampanhaResource;
use App\Models\CampanhaProdutos;
use App\Models\Campanhas;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosCampanhaController extends Controller
{

    public function index()
    {
        //return CampanhaProdutos::all();
        return ProdutosCampanhaResource::collection(CampanhaProdutos::all());
    }

    public function store(ProdutosCampanhaRequest $request)
    {

        $pro = Produtos::find($request->produto_id);
        $cam = Campanhas::find($request->campanha_id);

        $novo = new CampanhaProdutos;
        $novo->produto_id = $pro->id;
        $novo->campanha_id =$cam->id;
        $novo->produtos_campanha = $request->produtos_campanha;

        $novo->save();

        return 'sucess create';

    }

    public function update(Request $request, $id)
    {
        if(CampanhaProdutos::where('id',$id)->exists()){

            $request->validate([
                'produto_id' => 'exists:produtos,id',
                'campanha_id' => 'exists:campanhas,id',
            ]);
    
            $novo = CampanhaProdutos::find($id);
    
            $novo->produto_id = is_null($request->get('produto_id')) ? $novo->produto_id : $request->produto_id;
            $novo->campanha_id = is_null($request->get('campanha_id')) ? $novo->campanha_id : $request->campanha_id;
            $novo->save();
    
            return 'sucess update';

        }
        return 'produtos da campanha id update not found';
    }

    public function destroy($id)
    {
        if(CampanhaProdutos::where('id',$id)->exists())
        {
            $novo = CampanhaProdutos::find($id);
            $novo->delete();

            return 'Sucesso deleted';
        }
        return 'produtos da campanha id delete not found';

    }
}
