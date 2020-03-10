<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Imovel;
use App\ImagemImovel;
use App\TipoImovel;
use App\CategoriaImovel;
use App\TipoAnuncio;
use App\TipoAnunciante;
use App\AreasPrivativas;
use App\AreasComuns;
use App\Pacote;
use App\Site;
use App\Compra;
use App\Destaque;
use DB;
use Mail;
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
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio',
            DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"),
            DB::raw("( SELECT nm_link_sm FROM tb_imagem a where tb_imovel.cd_image_anunciante = a.cd_imagem and a.deleted_at is null limit 1 ) as imagem_anunciante_nm_link")
             
        )
        ->whereIn('tb_imovel.cd_tipo_anuncio',[1,4,6])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->orderBy('ic_destaque','desc')->inRandomOrder()->get();
        $imoveis_aluguel = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio',
             DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"),
             DB::raw("( SELECT nm_link_sm FROM tb_imagem a where tb_imovel.cd_image_anunciante = a.cd_imagem and a.deleted_at is null limit 1 ) as imagem_anunciante_nm_link")
        )
        ->whereIn('tb_imovel.cd_tipo_anuncio',[2,5])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->orderBy('ic_destaque','desc')->inRandomOrder()->get();
        $imoveis_lancamentos = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio',
             DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"),
             DB::raw("( SELECT nm_link_sm FROM tb_imagem a where tb_imovel.cd_image_anunciante = a.cd_imagem and a.deleted_at is null limit 1 ) as imagem_anunciante_nm_link")
        )->whereIn('tb_imovel.cd_tipo_anuncio',[3])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->orderBy('ic_destaque','desc')->inRandomOrder()->get();

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

    public function contrateAgora(){
        $pacotes = Pacote::where('cd_status','=',1)->get();    
        $destaques = Destaque::where('ic_super',0)->get();  
        $super_destaques = Destaque::where('ic_super',1)->get();
        return view('pacotes',[
            'pacotes'=> $pacotes,
            'destaques'=>$destaques ,
            'super_destaques'=>$super_destaques
        ]);
    }

    public function institucional(Request $request, $slug){
        $site = Site::where('nm_site',$slug)->first();
        if(!$site) redirect('/');

        return view('institucional', ['site'=>$site]);
    }
    public function termo(){
        
    }

    public function seguranca(){
        
    }

    public function detail(Request $request, $id){
        $inputs = (object) $request->all();
        $filter = Imovel::selectRaw("MAX(vl_imovel) as max_value, Min(vl_imovel) as min_value"); 
        $imovel = Imovel::where('cd_imovel', $id)
        ->select( 'tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio')
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')->first();
        
        if(!$imovel){
            return back();
        }

        if($imovel->cd_image_anunciante){
            $imovel->imagem_anunciante = ImagemImovel::where('cd_imagem', $imovel->cd_image_anunciante)->first();
        }

        $imovel->imagens = ImagemImovel::where('cd_imovel', $imovel->cd_imovel)->get();
        $ap = explode(';', $imovel->ds_areas_privativas);
        $ac = explode(';', $imovel->ds_areas_comuns);
            
        $areas_privativas = AreasPrivativas::
        //where('cd_categoria_imovel','=',$imovel->cd_categoria_imovel)
        whereIn('cd_areas_privativas', $ap)->orderBy('nm_areas_privativas')->get();
        $areas_comuns = AreasComuns::
        //where('cd_categoria_imovel','=',$imovel->cd_categoria_imovel)
        whereIn('cd_areas_comuns', $ac)->orderBy('nm_areas_comuns')->get();

        return view('detail',[
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get(),
            'AreasComuns'=> $areas_comuns,
            'AreasPrivativas'=> $areas_privativas,
            'imovel'=>$imovel,
            'filter'=>$filter->first()
        ]);

    }

    public function sendContactMenssage(Request $request, $id){
        $inputs = (object) $request->all();
        $imovel = Imovel::where('cd_imovel', $id)->join('users','users.id','=','tb_imovel.cd_user')->first();
        // dd([$inputs,$imovel]);
        $result =  Mail::send('vendor.mail.contact', [
            'url'=> url('/'),
            'slot' => "
                Nome: $inputs->name;<br>
                E-mail: $inputs->email;<br>
                Telefone: $inputs->tel;<br>
                Mensagem: $inputs->mensagem ;<br>
            ",
            'titulo'=> 'Novo Contato Realizado! Imóvel - '. $imovel->nm_titulo
        ] , function ($m) use ( $inputs, $imovel ) {
            $m->from('site@flximoveis.com.br', 'FLX Imóveis');
            $m->sender($inputs->email, $inputs->name);
            $m->replyTo($inputs->email, $inputs->name);
            $m->to($imovel->email, $imovel->name);
            $m->subject('Novo Contato Realizado! Imóvel - '. $imovel->nm_titulo);
        });
        return redirect()->back()->with( 'send', true );

    }

    public function search(Request $request, $typeS = ''){
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
            DB::raw("( SELECT nm_link_sm FROM tb_imagem a where tb_imovel.cd_image_anunciante = a.cd_imagem and a.deleted_at is null limit 1 ) as imagem_anunciante_nm_link")
        )
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio');
        if(isset($inputs->cd_imovel)  && $inputs->cd_imovel){
            $imoveis = $imoveis->where('cd_imovel', $inputs->cd_imovel);
        }else{
            $inputs->cd_imovel = '';
            if(isset($inputs->cd_tipo_imovel)  && $inputs->cd_tipo_imovel){
                $imoveis = $imoveis->where('tb_imovel.cd_tipo_imovel', $inputs->cd_tipo_imovel);
            }else{
                $inputs->cd_tipo_imovel = null;
            }
            if(isset($inputs->Endereco)  && $inputs->Endereco){
                $imoveis = $imoveis->where(function($q) use ($inputs) {
                    $q->where('cd_cep', 'like', '%'.$inputs->Endereco.'%')
                    ->orWhere('nm_endereco', 'like', '%'.$inputs->Endereco.'%')
                    ->orWhere('nm_bairro', 'like', '%'.$inputs->Endereco.'%')
                    ->orWhere('nm_cidade', 'like', '%'.$inputs->Endereco.'%')
                    ->orWhere('cd_uf', 'like', '%'.$inputs->Endereco.'%');
                });
            }else{
                $inputs->Endereco = '';
            }
            if(isset($inputs->precoDe)  && isset($inputs->precoAte)  && $inputs->precoDe && $inputs->precoAte){
                $inputs->precoDe = str_replace(',','.',str_replace('.','',str_replace('R$ ','',$inputs->precoDe)));
                $inputs->precoAte = str_replace(',','.',str_replace('.','',str_replace('R$ ','',$inputs->precoAte)));
                $imoveis = $imoveis->where('vl_imovel', '>=',$inputs->precoDe);
                $imoveis = $imoveis->where('vl_imovel', '<=',$inputs->precoAte);
            }else{
                $inputs->precoDe = null;
                $inputs->precoAte = null;
            }
            if(isset($inputs->qt_quartos)  && $inputs->qt_quartos){
               $imoveis = $imoveis->where('qt_quartos', $inputs->qt_quartos);
            }else{
                $inputs->qt_quartos = null;
            }
            if(isset($inputs->qt_banheiro)  && $inputs->qt_banheiro){
               $imoveis = $imoveis->where('qt_banheiro', $inputs->qt_banheiro);
            }else{
                $inputs->qt_banheiro = null;
            }
            if(isset($inputs->qt_vagas)  &&$inputs->qt_vagas){
               $imoveis = $imoveis->where('qt_banheiro', $inputs->qt_vagas);
            }else{
                $inputs->qt_vagas = null;
            }
            if(isset($inputs->metragem)  && $inputs->metragem){ 
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
            }else{
                $inputs->metragem = null;
            }

            if( (isset($inputs->search_for) && $inputs->search_for) || $typeS != '' ){
                if(!(isset($inputs->search_for) && $inputs->search_for)){
                    $inputs->search_for = $typeS;
                }
                switch ($inputs->search_for) {
                    case 'sell':
                    case 1:
                        $tipes = [1,4,6];
                        $inputs->search_for = 1;
                        break;
                    case 'rent':
                    case 2:
                        $tipes = [2,5];
                        $inputs->search_for = 2;
                        break;
                    case 'news':
                    case 3:
                        $tipes = [3];
                        $inputs->search_for = 3;
                        break;
                    default:
                     return redirect('/');
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
            'imoveis'=> $imoveis->orderBy('ic_destaque','desc')->inRandomOrder('cd_imovel')->paginate(20),
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
        $compra = Compra::where('cd_user',Auth::user()->id)
        ->select('tb_pacotes.nm_titulo', 'tb_compra.*')
        ->join('tb_pacotes','tb_pacotes.cd_pacote','=','tb_compra.cd_pacote')
        ->orderBy('cd_compra','desc')
        ->get();
        foreach ($compra as $key => $c) {
            $compra[$key]->status = $this->statusCompra($c->ic_processado);
        }  
        $compra_destaque = Compra::where('cd_user',Auth::user()->id)
        ->join('tb_destaques','tb_destaques.cd_destaque','=','tb_compra.cd_destaque')
        ->orderBy('cd_compra','desc')
        ->select('tb_destaques.qt_destaque', 'tb_destaques.ic_super', 'tb_compra.*')
        ->get(); 
        foreach ($compra_destaque as $key => $c) {
            $compra_destaque[$key]->status = $this->statusDestaque($c->ic_processado);
        } 
        $pacotes = Pacote::where('cd_status','=',1)->get();    
        $destaques = Destaque::where('ic_super',0)->get();  
        $super_destaques = Destaque::where('ic_super',1)->get();
        return view('pacotesAdesao', [
            'pacotes'=>$pacotes,
            'compra'=>$compra,
            'compra_destaque'=>$compra_destaque,
            'super_destaques'=>$super_destaques,
            'destaques'=>$destaques,
            'canBuy'=>true
        ]);
    }

    public function viacep($cep)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://viacep.com.br/ws/'.$cep.'/json/');
        return response()->json(json_decode($res->getBody()));
    }

}
