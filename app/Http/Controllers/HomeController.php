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
        $filter = Imovel::selectRaw("MAX(vl_imovel) as max_value, Min(vl_imovel) as min_value")->first();
        $imoveis_venda = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio', DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"))
        ->whereIn('tb_imovel.cd_tipo_anuncio',[1,4,6])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->inRandomOrder()->get();
        $imoveis_aluguel = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio', DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"))
        ->whereIn('tb_imovel.cd_tipo_anuncio',[2,5])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->inRandomOrder()->get();
        $imoveis_lancamentos = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio', DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"))
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
            'imoveis_lancamentos'=>$imoveis_lancamentos,
            'filter'=>$filter
        ]);
    }

    public function detail(Request $request, $id){
        $inputs = (object) $request->all();
        $filter = Imovel::selectRaw("MAX(vl_imovel) as max_value, Min(vl_imovel) as min_value"); 
        $imovel = Imovel::where('cd_imovel', $id)
        ->select( 'tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio', DB::raw("( vl_imovel / vl_area_total ) as ValorM2 ") )
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')->first();
        
        if(!$imovel){
            return back();
        }
        if($imovel->cd_image_anunciante){
            $imovel->imagem_anunciante = ImagemImovel::where('cd_imagem', $imovel->cd_image_anunciante)->first();
        }
        $imovel->imagens = ImagemImovel::where('cd_imovel', $imovel->cd_imovel)->get();
            
        $areas_privativas = AreasPrivativas::where('cd_categoria_imovel','=',$imovel->cd_categoria_imovel)->orderBy('nm_areas_privativas')->get();
        $areas_comuns = AreasComuns::where('cd_categoria_imovel','=',$imovel->cd_categoria_imovel)->orderBy('nm_areas_comuns')->get();

        return view('detail',[
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get(),
            'areas_comuns'=> $areas_comuns,
            'areas_privativas'=> $areas_privativas,
            'imovel'=>$imovel,
            'filter'=>$filter->first()
        ]);

    }

    public function search(Request $request){
        $inputs = (object) $request->all();
        /**{
         * #237 ▼
                +"cd_tipo_imovel": "1"
                +"Endereco": null
                +"preco": null
                +"qt_quartos": null
                +"qt_banheiro": null
                +"qt_vagas": null
                +"metragem": null
                +"cd_imovel": null

                
            } */
        $filter = Imovel::selectRaw("MAX(vl_imovel) as max_value, Min(vl_imovel) as min_value");
        $imoveis = Imovel::
        select(
            'tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio', 
            DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"),
            DB::raw("( vl_imovel / vl_area_total ) as ValorM2 ")
        )
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio');
        if($inputs->cd_imovel){
            $imoveis = $imoveis->where('cd_imovel', $inputs->cd_imovel);
        }else{
            if($inputs->cd_tipo_imovel){
                $imoveis = $imoveis->where('tb_imovel.cd_tipo_imovel', $inputs->cd_tipo_imovel);
            }
            if($inputs->Endereco){
                $imoveis = $imoveis->where(function($q) use ($inputs) {
                    $q->where('cd_cep', 'like', '%'.$inputs->Endereco.'%')
                    ->orWhere('nm_endereco', 'like', '%'.$inputs->Endereco.'%')
                    ->orWhere('nm_bairro', 'like', '%'.$inputs->Endereco.'%')
                    ->orWhere('nm_cidade', 'like', '%'.$inputs->Endereco.'%')
                    ->orWhere('cd_uf', 'like', '%'.$inputs->Endereco.'%');
                });
            }
            if($inputs->precoDe && $inputs->precoAte){
                $inputs->precoDe = str_replace(',','.',str_replace('.','',str_replace('R$ ','',$inputs->precoDe)));
                $inputs->precoAte = str_replace(',','.',str_replace('.','',str_replace('R$ ','',$inputs->precoAte)));
                $imoveis = $imoveis->where('vl_imovel', '>=',$inputs->precoDe);
                $imoveis = $imoveis->where('vl_imovel', '<=',$inputs->precoAte);
            }
            if($inputs->qt_quartos){
               $imoveis = $imoveis->where('qt_quartos', $inputs->qt_quartos);
            }
            if($inputs->qt_banheiro){
               $imoveis = $imoveis->where('qt_banheiro', $inputs->qt_banheiro);
            }
            if($inputs->qt_vagas){
               $imoveis = $imoveis->where('qt_banheiro', $inputs->qt_vagas);
            }
            if($inputs->metragem){ 
                switch ($inputs->metragem) {
                    case 1:
                            $maior_q = 0;
                            $menor_q = 50;
                        break;
                    case 2:
                            $maior_q = 51;
                            $menor_q = 100;
                        break;
                    case 3:
                            $maior_q = 101;
                            $menor_q = 150;
                        break;
                    case 4:
                            $maior_q = 151;
                            $menor_q = 200;
                        break;
                    case 5:
                            $maior_q = 201;
                            $menor_q = 300;
                        break;
                    case 6:
                            $maior_q = 300;
                            $menor_q = 0;
                        break;
                }
                if($maior_q){
                    $imoveis = $imoveis->where('vl_area_total', '>=',$maior_q);
                }
                if($menor_q){
                    $imoveis = $imoveis->where('vl_area_total', '<=',$menor_q);
                }
            }

            if(isset($inputs->search_for)&&$inputs->search_for){
                
                switch ($inputs->search_for) {
                    case 1:
                        $tipes = [1,4,6];
                        break;
                    case 2:
                        $tipes = [2,5];
                        break;
                    case 3:
                        $tipes = [3];
                        break;
                }
                $imoveis = $imoveis->whereIn('tb_imovel.cd_tipo_anuncio',$tipes) ;
                $filter = $filter->whereIn('tb_imovel.cd_tipo_anuncio',$tipes) ;
            }else{
                $inputs->search_for = "";
            }
        } 
        
        return view('search',[
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get(),
            'imoveis'=> $imoveis->inRandomOrder()->paginate(10),
            'old_values'=>$inputs,
            'filter'=>$filter->first()
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
