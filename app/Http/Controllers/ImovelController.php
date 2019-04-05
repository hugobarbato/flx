<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Imovel;
use App\TipoImovel;
use App\CategoriaImovel;
use App\TipoAnuncio;
use App\TipoAnunciante;

class ImovelController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function cadastrar_view(){
         return view('content/cadastro',[
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get()
         ]);
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nm_titulo' => ['required', 'string', 'max:60'],
            'cd_cep' => ['required', 'string', 'max:10'],
            'nm_endereco' => ['required', 'string', 'max:255'],
            'nm_numero' => ['required', 'string', 'max:10'],
            'nm_complemento' => [ 'string', 'max:50'],
            'nm_bairro' => ['required', 'string', 'max:100'],
            'nm_cidade' => ['required', 'string', 'max:100'],
            'cd_uf' => ['required', 'string', 'max:2'],
            
            'qt_quartos' => ['required', 'numeric'],
            'qt_suites' => ['required', 'numeric'],
            'qt_vagas' => ['required', 'numeric'],
            'vl_area_util' => ['required', 'numeric'],
            'vl_area_total' => ['required', 'numeric'],
            
            'ds_imovel' => ['required'],
            'vl_imovel' => ['required', 'numeric'],
            
            'vl_condominio' => ['required', 'numeric'],
            'vl_iptu' => ['required', 'numeric'],
            'cd_tipo_anunciante' => ['required', 'numeric'],
            'cd_tipo_anuncio' => ['required', 'numeric'],
            'cd_tipo_imovel' => ['required', 'numeric']
        ]);
    }
    
    
    
    public function cadastrar_action(Request $request){
        $validator = $this->validator($request->all());
        
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        
        $imovel = new Imovel;
        
        $imovel->cd_tipo_anunciante = $request->cd_tipo_anunciante;
        $imovel->cd_tipo_anuncio = $request->cd_tipo_anuncio;
        $imovel->cd_tipo_imovel = $request->cd_tipo_imovel;
        $imovel->nm_titulo = $request->nm_titulo;
        $imovel->cd_cep = $request->cd_cep;
        $imovel->nm_endereco = $request->nm_endereco;
        $imovel->nm_numero = $request->nm_numero;
        $imovel->nm_complemento = $request->nm_complemento;
        $imovel->nm_bairro = $request->nm_bairro;
        $imovel->nm_cidade = $request->nm_cidade;
        $imovel->cd_uf = $request->cd_uf;
        $imovel->qt_quartos = $request->qt_quartos;
        $imovel->qt_suites = $request->qt_suites;
        $imovel->qt_banheiro = $request->qt_banheiro;
        $imovel->qt_vagas = $request->qt_vagas;
        $imovel->vl_area_util = $request->vl_area_util;
        $imovel->ds_imovel = $request->ds_imovel;
        $imovel->ds_imovel = $request->ds_imovel;
        $imovel->vl_imovel = $request->vl_imovel;
        $imovel->vl_condominio = $request->vl_condominio;
        $imovel->vl_iptu = $request->vl_iptu;
        $imovel->cd_forma_pagamento = $request->cd_forma_pagamento;
        $imovel->vl_condominio = $request->vl_condominio;
        $imovel->cd_user = Auth::user()->id ;
        $imovel->save();

    }
    
}
