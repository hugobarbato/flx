<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ImageController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Imovel;
use App\ImagemImovel;
use App\TipoImovel;
use App\CategoriaImovel;
use App\TipoAnuncio;
use App\TipoAnunciante;
use App\AreasPrivativas;
use App\AreasComuns;
use DB;

class ImovelController extends Controller
{
    public $ctl_imagem = false;
    public function __construct() {
        $this->middleware('auth');
        $this->ctl_imagem = new ImageController;
    }
    
    public function getImoveis(Request $request, $typeS = ''){
      

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
        $imoveis = Imovel::where('cd_user',Auth::user()->id)->
        select(
            'tb_imovel.*', 'nm_tipo_imovel','nm_tipo_anuncio', 
            DB::raw("( SELECT nm_link FROM tb_imagem i where tb_imovel.cd_imovel = i.cd_imovel and i.deleted_at is null limit 1 ) as nm_link"),
            DB::raw("( SELECT nm_link_sm FROM tb_imagem a where tb_imovel.cd_image_anunciante = a.cd_imagem and a.deleted_at is null limit 1 ) as imagem_anunciante_nm_link"),
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
        $t_imob = Imovel::where('cd_user',Auth::user()->id)->count(); 
        return view('content.imovel.listar',[
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get(),
            'imoveis'=> $imoveis->paginate(10),
            'imoveis_c'=>  $t_imob,
            'old_values'=>$inputs,
            'filter'=>$filter->first()
        ]);

    }
    
    protected function validator(array $data) {
        return Validator::make($data, [
            'nm_titulo' => ['required', 'string', 'max:60'],
            'cd_cep' => ['required', 'string', 'max:10'],
            'nm_endereco' => ['required', 'string', 'max:255'],
            'nm_numero' => ['required', 'string', 'max:10'],
            'nm_bairro' => ['required', 'string', 'max:100'],
            'nm_cidade' => ['required', 'string', 'max:100'],
            'cd_uf' => ['required', 'string', 'max:2'],
            
            // 'qt_quartos' => ['required', 'numeric'],
            // 'qt_suites' => ['required', 'numeric'],
            // 'qt_vagas' => ['required', 'numeric'],
            // 'vl_area_util' => ['required', 'numeric'],
            // 'vl_area_total' => ['required', 'numeric'],
            
            // 'ds_imovel' => ['required'],
            // 'vl_imovel' => ['required', 'numeric'],
            
            // 'vl_condominio' => ['required', 'numeric'],
            // 'vl_iptu' => ['required', 'numeric'],
            'cd_tipo_anunciante' => ['required', 'numeric'],
            'cd_tipo_anuncio' => ['required', 'numeric'],
            'cd_tipo_imovel' => ['required', 'numeric'],
            
            // 'nm_complemento' => ['string', 'max:50'],
            
            // 'ic_permuta'=>['numeric'],
            // 'nm_link_youtube'=>['url'],
            // 'ds_areas_comuns'=>['string'],
            // 'ds_areas_privativas'=>['string']
            
        ]);
    }
    
    public function add_view(){
         return view('content.imovel.add',[
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get()
         ]);
    }

    public function add_action(Request $request){ 
        $inputs = (object) $request->all();
        //   dd($inputs); 
        if(isset($inputs->ds_areas_comuns) && count($inputs->ds_areas_comuns) > 0) $inputs->ds_areas_comuns = implode(';',$inputs->ds_areas_comuns);
        if(isset($inputs->ds_areas_privativas) && count($inputs->ds_areas_privativas) > 0)$inputs->ds_areas_privativas = implode(';',$inputs->ds_areas_privativas);
          
        if(isset($inputs->vl_imovel) && $inputs->vl_imovel != '') $inputs->vl_imovel = preg_replace("/,/", '.', preg_replace("/\./", '', $inputs->vl_imovel));
        if(isset($inputs->vl_condominio) && $inputs->vl_condominio != '') $inputs->vl_condominio = preg_replace("/,/", '.', preg_replace("/\./", '',$inputs->vl_condominio));
        if(isset($inputs->vl_iptu) && $inputs->vl_iptu != '') $inputs->vl_iptu = preg_replace("/,/", '.', preg_replace("/\./", '',$inputs->vl_iptu));
        
        $validator = $this->validator(((array)$inputs));
        
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        
        $imovel = new Imovel;
        
        
        $imovel->cd_tipo_anunciante = $inputs->cd_tipo_anunciante;
        $imovel->cd_tipo_anuncio = $inputs->cd_tipo_anuncio;
        $imovel->cd_tipo_imovel = $inputs->cd_tipo_imovel;
        $imovel->nm_titulo = $inputs->nm_titulo;
        $imovel->cd_cep = $inputs->cd_cep;
        $imovel->nm_endereco = $inputs->nm_endereco;
        $imovel->nm_numero = $inputs->nm_numero;
        $imovel->nm_complemento = $inputs->nm_complemento;
        $imovel->nm_bairro = $inputs->nm_bairro;
        $imovel->nm_cidade = $inputs->nm_cidade;
        $imovel->cd_uf = $inputs->cd_uf;
        $imovel->qt_quartos = $inputs->qt_quartos;
        $imovel->qt_suites = $inputs->qt_suites;
        $imovel->qt_banheiro = $inputs->qt_banheiro;
        $imovel->qt_vagas = $inputs->qt_vagas;
        $imovel->vl_area_util = $inputs->vl_area_util;
        $imovel->vl_area_total = $inputs->vl_area_total;
        $imovel->ds_imovel = $inputs->ds_imovel;
         
        $imovel->ic_valor_mensagem = isset($inputs->ic_valor_mensagem)?$inputs->ic_valor_mensagem:0;
        $imovel->ic_permuta = isset($inputs->ic_permuta)?$inputs->ic_permuta:0;

        if(isset($inputs->ic_status)) $imovel->ic_status = $inputs->ic_status; 

        $imovel->dt_previsao_entrega = (
            is_string($inputs->dt_previsao_entrega) ?
            $this->returnIsoDate($inputs->dt_previsao_entrega):null) ;
        
        
        $imovel->vl_imovel =  $inputs->vl_imovel;
        $imovel->vl_condominio = $inputs->vl_condominio;
        $imovel->vl_iptu =  $inputs->vl_iptu;
        

        
        $imovel->cd_forma_pagamento = (isset($inputs->cd_forma_pagamento)?$inputs->cd_forma_pagamento:null);
        $imovel->vl_condominio = $inputs->vl_condominio;
        if(isset($inputs->ds_areas_comuns)) $imovel->ds_areas_comuns =  $inputs->ds_areas_comuns; 
        if(isset($inputs->ds_areas_privativas)) $imovel->ds_areas_privativas =  $inputs->ds_areas_privativas;
        
        $imovel->nm_link_youtube =  $inputs->nm_link_youtube;

        $imovel->cd_forma_pagamento = (isset($inputs->cd_forma_pagamento)?$inputs->cd_forma_pagamento:null);
        $imovel->vl_condominio = $inputs->vl_condominio;
        if(isset($inputs->ds_areas_comuns)) $imovel->ds_areas_comuns =  $inputs->ds_areas_comuns; 
        if(isset($inputs->ds_areas_privativas)) $imovel->ds_areas_privativas =  $inputs->ds_areas_privativas;
        
        $imovel->nm_link_youtube =  $inputs->nm_link_youtube;
        
        $imovel->cd_user = Auth::user()->id ;
        $imovel->save();

        if(isset($inputs->pic_anunciante)){
            if($imovel->cd_image_anunciante){
                $this->ctl_imagem->removeImagem($imovel->cd_image_anunciante);
            }
            $imagem = $this->ctl_imagem->uploadAnuncianteImovel($inputs->pic_anunciante, $imovel);
            if($imagem){
                $imovel->cd_image_anunciante =  $imagem->cd_imagem;
            }
            $imovel->save();
        }

        return redirect('imovel/editar/'.$imovel->cd_imovel);

    }
    
    public function edit_view($id){
        
        $imovel = Imovel::leftJoin('tb_tipo_imovel','tb_tipo_imovel.cd_tipo_imovel','=','tb_imovel.cd_tipo_imovel')
        ->where('cd_user',Auth::user()->id)->where('cd_imovel',$id)->first();
        
        if(!$imovel){
            return back();
        }
        if($imovel->cd_image_anunciante){
            $imovel->imagem_anunciante = ImagemImovel::where('cd_imagem', $imovel->cd_image_anunciante)->first();
        }
        $imovel->imagens = ImagemImovel::where('cd_imovel', $imovel->cd_imovel)->get();
            
        $areas_privativas = AreasPrivativas::where('cd_categoria_imovel','=',$imovel->cd_categoria_imovel)->orderBy('nm_areas_privativas')->get();
        $areas_comuns = AreasComuns::where('cd_categoria_imovel','=',$imovel->cd_categoria_imovel)->orderBy('nm_areas_comuns')->get();
        
        return view('content.imovel.edit',[
            'imovel' => $imovel,
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get(),


            'AreasPrivativas'=>$areas_privativas ,
            'AreasComuns'=>$areas_comuns
        ]);
    }

    public function edit_action(Request $request, $id){
        $inputs = (object) $request->all();
        if(isset($inputs->ds_areas_comuns) && count($inputs->ds_areas_comuns) > 0) $inputs->ds_areas_comuns = implode(';',$inputs->ds_areas_comuns);
        if(isset($inputs->ds_areas_privativas) && count($inputs->ds_areas_privativas) > 0)$inputs->ds_areas_privativas = implode(';',$inputs->ds_areas_privativas);
        
        if(isset($inputs->vl_imovel) && $inputs->vl_imovel != '') $inputs->vl_imovel = preg_replace("/,/", '.', preg_replace("/\./", '', $inputs->vl_imovel));
        if(isset($inputs->vl_condominio) && $inputs->vl_condominio != '') $inputs->vl_condominio = preg_replace("/,/", '.', preg_replace("/\./", '',$inputs->vl_condominio));
        if(isset($inputs->vl_iptu) && $inputs->vl_iptu != '') $inputs->vl_iptu = preg_replace("/,/", '.', preg_replace("/\./", '',$inputs->vl_iptu));
        
        
        $validator = $this->validator(((array)$inputs));
        
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        $imovel = Imovel::where('cd_user',Auth::user()->id)->where('cd_imovel',$id)->first();
        
        $imovel->cd_tipo_anunciante = $inputs->cd_tipo_anunciante;
        $imovel->cd_tipo_anuncio = $inputs->cd_tipo_anuncio;
        $imovel->cd_tipo_imovel = $inputs->cd_tipo_imovel;
        $imovel->nm_titulo = $inputs->nm_titulo;
        $imovel->cd_cep = $inputs->cd_cep;
        $imovel->nm_endereco = $inputs->nm_endereco;
        $imovel->nm_numero = $inputs->nm_numero;
        $imovel->nm_complemento = $inputs->nm_complemento;
        $imovel->nm_bairro = $inputs->nm_bairro;
        $imovel->nm_cidade = $inputs->nm_cidade;
        $imovel->cd_uf = $inputs->cd_uf;
        $imovel->qt_quartos = $inputs->qt_quartos;
        $imovel->qt_suites = $inputs->qt_suites;
        $imovel->qt_banheiro = $inputs->qt_banheiro;
        $imovel->qt_vagas = $inputs->qt_vagas;
        $imovel->vl_area_util = $inputs->vl_area_util;
        $imovel->vl_area_total = $inputs->vl_area_total;
        $imovel->ds_imovel = $inputs->ds_imovel;
        $imovel->ds_imovel = $inputs->ds_imovel; 
        
        $imovel->ic_valor_mensagem = isset($inputs->ic_valor_mensagem)?$inputs->ic_valor_mensagem:0;
        $imovel->ic_permuta = isset($inputs->ic_permuta)?$inputs->ic_permuta:0;
        
        if(isset($inputs->ic_status)) $imovel->ic_status = $inputs->ic_status; 
        $imovel->dt_previsao_entrega = (
            is_string($inputs->dt_previsao_entrega) ?
            $this->returnIsoDate($inputs->dt_previsao_entrega):null) ;
        
        
        $imovel->vl_imovel =  $inputs->vl_imovel;
        $imovel->vl_condominio = $inputs->vl_condominio;
        $imovel->vl_iptu =  $inputs->vl_iptu;
        
        $imovel->cd_forma_pagamento = (isset($inputs->cd_forma_pagamento)?$inputs->cd_forma_pagamento:null);
        $imovel->vl_condominio = $inputs->vl_condominio;
        if(isset($inputs->ds_areas_comuns)) $imovel->ds_areas_comuns =  $inputs->ds_areas_comuns; 
        if(isset($inputs->ds_areas_privativas)) $imovel->ds_areas_privativas =  $inputs->ds_areas_privativas;
        
        $imovel->nm_link_youtube =  $inputs->nm_link_youtube;
        
        if(isset($inputs->pic_anunciante)){
            if($imovel->cd_image_anunciante){
                $this->ctl_imagem->removeImagem($imovel->cd_image_anunciante);
            }
            $imagem = $this->ctl_imagem->uploadAnuncianteImovel($inputs->pic_anunciante, $imovel);
            if($imagem){
                $imovel->cd_image_anunciante =  $imagem->cd_imagem;
            }
        }
        
        $imovel->save();
        return redirect('/imovel/editar/'.$imovel->cd_imovel)->with(['success'=>'Imovel editado com sucesso!']);

    }
    
    public function remover_logo_anunciante(Request $request, $id){
        $imovel = Imovel::where('cd_user',Auth::user()->id)->where('cd_imovel',$id)->first();
        
        if(!$imovel){
            return back()->withErros('Não foi realizar a alteração.');
        }
        if($imovel->cd_image_anunciante){
            $this->ctl_imagem->removeImagem($imovel->cd_image_anunciante);
        }
        $imovel->cd_image_anunciante = null;
        $imovel->save();
        return redirect('/imovel/editar/'.$imovel->cd_imovel)->with(['success'=>'Imovel editado com sucesso!']);
    }

    public function adicionar_fotos(Request $request, $id){
        $imovel = Imovel::where('cd_user',Auth::user()->id)->where('cd_imovel',$id)->first();
        $imagens = ImagemImovel::where('cd_imovel', $imovel->cd_imovel)->get();
        if(count($imagens)==20){
            return back()->withErros('Limite de envio de imagens alcançado.');
        }else{
            $limit_atual = 20-count($imagens);
            if(count($request->pics) > $limit_atual){
                return back()->withErros( 'Ops, você apenas possuí '.$limit_atual.' de envio, não conseguimos subir as '.count($request->pics).' imagens enviadas.' );
            }else{
                foreach($request->pics as $pic){
                    $imagem = $this->ctl_imagem->uploadImagemImovel($pic, $imovel);
                }
            }
        }
        return redirect('/imovel/editar/'.$imovel->cd_imovel);
    }

    public function remover_imagem(Request $request, $id, $imagem){
        $imovel = Imovel::where('cd_user',Auth::user()->id)->where('cd_imovel',$id)->first();
        if(!$imovel) return back()->withErros('Não foi realizar a alteração.'); 
        $this->ctl_imagem->removeImagem($imagem);
        return redirect('/imovel/editar/'.$imovel->cd_imovel)->with(['success'=>'Imovel editado com sucesso!']);
    }
    
}
