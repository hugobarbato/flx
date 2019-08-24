<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imovel;
use App\ImagemImovel;
use App\TipoImovel;
use App\CategoriaImovel;
use App\TipoAnuncio;
use App\TipoAnunciante;
use App\AreasPrivativas;
use App\AreasComuns;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $imoveis_venda = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio', DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel limit 1 ) as nm_link"))
        ->whereIn('tb_imovel.cd_tipo_anuncio',[1,4,6])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->inRandomOrder()->get();
        $imoveis_aluguel = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio', DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel limit 1 ) as nm_link"))
        ->whereIn('tb_imovel.cd_tipo_anuncio',[2,5])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->inRandomOrder()->get();
        $imoveis_lancamentos = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio', DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel limit 1 ) as nm_link"))
        ->whereIn('tb_imovel.cd_tipo_anuncio',[3])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->inRandomOrder()->get();

        return view('home',[
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get(),
            'imoveis_venda'=>$imoveis_venda,
            'imoveis_aluguel'=>$imoveis_aluguel,
            'imoveis_lancamentos'=>$imoveis_lancamentos
        ]);
    }
    
    public function resultadoBuscar()
    {
        return view('resultadoBuscar');
    }
    
    public function resultadoDetalhes()
    {
        return view('resultadoDetalhes');
    }
    
    public function pacotesAdesao()
    {
        return view('pacotesAdesao');
    }
    
    
    public function viacep($cep)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://viacep.com.br/ws/'.$cep.'/json/');
        return response()->json(json_decode($res->getBody()));
    }

}
