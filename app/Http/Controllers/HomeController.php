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
use App\Compra;
use CWG\PagSeguro\PagSeguroAssinaturas;
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
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio',
            DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"),
            DB::raw("( SELECT nm_link_sm FROM tb_imagem a where tb_imovel.cd_image_anunciante = a.cd_imagem and a.deleted_at is null limit 1 ) as imagem_anunciante_nm_link")
             
        )
        ->whereIn('tb_imovel.cd_tipo_anuncio',[1,4,6])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->inRandomOrder()->get();
        $imoveis_aluguel = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio',
             DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"),
             DB::raw("( SELECT nm_link_sm FROM tb_imagem a where tb_imovel.cd_image_anunciante = a.cd_imagem and a.deleted_at is null limit 1 ) as imagem_anunciante_nm_link")
        )
        ->whereIn('tb_imovel.cd_tipo_anuncio',[2,5])->limit(4)
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->inRandomOrder()->get();
        $imoveis_lancamentos = Imovel::
        select('tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio',
             DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"),
             DB::raw("( SELECT nm_link_sm FROM tb_imagem a where tb_imovel.cd_image_anunciante = a.cd_imagem and a.deleted_at is null limit 1 ) as imagem_anunciante_nm_link")
        )->whereIn('tb_imovel.cd_tipo_anuncio',[3])->limit(4)
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
            DB::raw("( vl_imovel / vl_area_total ) as ValorM2 ")
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
            'imoveis'=> $imoveis->inRandomOrder()->paginate(20),
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

        $pagseguro = new PagSeguroAssinaturas($this->email, $this->token, $this->sandbox);
        $pacotes = Pacote::where('cd_status','=',1)->get();   
        foreach ($pacotes as $key => $pacote) {
            if($pacote->cd_pagseguro ){
                $pacotes[$key]->url = $pagseguro->assinarPlanoCheckout($pacote->cd_pagseguro);
            }else{
                $pacotes[$key]->url = null;
            }
        }

        $compra = Compra::where('cd_user',Auth::user()->id)
        ->select('tb_pacotes.nm_titulo', 'tb_compra.*')
        ->join('tb_pacotes','tb_pacotes.cd_pacote','=','tb_compra.cd_pacote')
        ->orderBy('cd_compra','desc')
        ->get();
        foreach ($compra as $key => $c) {
            $compra[$key]->status = $this->statusCompra($c->ic_processado);
        }
        return view('pacotesAdesao', ['pacotes'=>$pacotes,'compra'=>$compra, 'canBuy'=>true]);
    }

    public function retornoAdesao(Request $request){
        
        $pagseguro = new PagSeguroAssinaturas($this->email, $this->token, $this->sandbox);
        $assinatura = $pagseguro->consultaAssinatura($request->id);
        if(!$assinatura){
            return redirect('/planos')->with('error','Não foi possível validar sua assinatura.');
        }else{
            $pacote = Pacote::where('nm_titulo', $assinatura['reference'] )->first();
            $compra = new Compra;
            $compra -> cd_user = Auth::user()->id;
            $compra -> cd_pacote = ($pacote?$pacote->cd_pacote:0);
            $compra -> vl_total = ($pacote?$pacote->vl_pacote:0);
            $compra -> ic_processado = $this->statusPagSeguro($assinatura['status']);
            $compra -> cd_pagseguro = $assinatura['code'];
            $compra->save();
            return redirect('/planos');

        } 
    }

    public function cancelamentoPagseguro($id_pagseguro){
        $pagseguro = new PagSeguroAssinaturas($this->email, $this->token, $this->sandbox);

        $compra = Compra::where('cd_pagseguro',$id_pagseguro)->first();
        if(!$compra){
            return redirect()->back()->with('error','Compra não encontrada');
        }
        try {
            $cancel = $pagseguro->cancelarAssinatura($id_pagseguro);
            if($cancel){
                $assinatura = $pagseguro->consultaAssinatura($id_pagseguro);
                // dd($assinatura);    
                $compra -> ic_processado = $this->statusPagSeguro($assinatura['status']);
                $compra->save();
            }
            return redirect()->back(); 
            //code...
        } catch (\Exception $ex) { 
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function notificacaoPagseguro(Request $request){ 
        if( isset($request->notificationType) && isset($request->notificationCode) ){
            switch ($request->notificationType) {
                case 'preApproval':
                        $pagseguro = new PagSeguroAssinaturas($this->email, $this->token, $this->sandbox);
                        $assinatura = $pagseguro->consultarNotificacao($request->notificationCode);
                        $compra = Compra::where('cd_pagseguro',$assinatura['code'])->first();
                        $compra -> ic_processado = $this->statusPagSeguro($assinatura['status']);
                        $compra->save();
                    break;
                default:
                    # code...
                    break;
            }
            return 'ok';
        }
    }   
    
    public function viacep($cep)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://viacep.com.br/ws/'.$cep.'/json/');
        return response()->json(json_decode($res->getBody()));
    }

}
