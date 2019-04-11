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

class ImovelController extends Controller
{
    public $ctl_imagem = false;
    public function __construct() {
        $this->middleware('auth');
        $this->ctl_imagem = new ImageController;
    }
    
    public function getImoveis(){
        $imovel = Imovel::where('cd_user',Auth::user()->id)->get();
        if(!$imovel){
            return back();
        }
        return view('content.imovel.listar',[
            'imoveis' => $imovel
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
        $imovel->ds_imovel = $inputs->ds_imovel;
        $imovel->vl_imovel = $inputs->vl_imovel;
        $imovel->vl_condominio = $inputs->vl_condominio;
        $imovel->vl_iptu = $inputs->vl_iptu;
        $imovel->cd_forma_pagamento = (isset($inputs->cd_forma_pagamento)?$inputs->cd_forma_pagamento:null);
        $imovel->vl_condominio = $inputs->vl_condominio;
        $imovel->ic_permuta = $inputs->ic_permuta;
        $imovel->cd_user = Auth::user()->id ;
        $imovel->save();
        return redirect('imovel/editar/'.$imovel->cd_imovel);

    }
    
    public function edit_view($id){
        
        $imovel = Imovel::where('cd_user',Auth::user()->id)->where('cd_imovel',$id)->first();
        
        if(!$imovel){
            return back();
        }
        if($imovel->cd_image_anunciante){
            $imovel->imagem_anunciante = ImagemImovel::where('cd_imagem', $imovel->cd_image_anunciante)->first();
        }
        $imovel->imagens = ImagemImovel::where('cd_imovel', $imovel->cd_imovel)->get();
        return view('content.imovel.edit',[
            'imovel' => $imovel,
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get(),
            'AreasPrivativas'=>AreasPrivativas::get(),
            'AreasComuns'=>AreasComuns::get()
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
        
        $imovel->ic_permuta = $inputs->ic_permuta;
        
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
        if(count($imagens)==15){
            return back()->withErros('Limite de envio de imagens alcançado.');
        }else{
            $limit_atual = 15-count($imagens);
            if(count($request->pics) > $limit_atual){
                return back()->withErros( 'Ops, você apenas possuí '.$limit_atual.' de envio, não conseguimos subir as '.count($request->pics).' enviadas.' );
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
