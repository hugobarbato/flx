<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pacote;
use App\AreasPrivativas;
use App\AreasComuns;
use App\Imovel; 
use App\ImagemImovel;
use App\TipoImovel;
use App\CategoriaImovel;
use App\TipoAnuncio;
use App\TipoAnunciante; 
use DB;


class AdminController extends Controller
{
    private $user;
    private function beforeCheckAdmin(){
        $this->user = Auth::user();
        if(!$this->user->is_admin){
            return redirect('/home');
        }
    }
    /**
     * Show the application dashboard.
     *  
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $back = $this->beforeCheckAdmin();
        if($back) return $back;

        $dash = \DB::table('dashboard')->first(); 

        $recentes = Imovel::
        selectRaw("
            tb_imovel.nm_titulo,
            tb_imovel.created_at,
            IF(
                tb_pacotes.nm_titulo is not null, 
                tb_pacotes.nm_titulo, 
                IF(
                    ( cast( tb_compra.created_at as date ) > ( curdate() - interval 45 day ) ),
                    'TESTE',
                    IF(
                        users.is_admin = 1, 'ADMIN', 'INATIVO'
                    )
                )
            ) as status, 
            users.email as email,
            users.cd_document as doc,
            users.ic_juridica as jud,
            users.name as name

        ")
        ->leftJoin('users','users.id','=','tb_imovel.cd_user')
        ->leftJoin('tb_compra','users.id','=','tb_compra.cd_user')
        ->leftJoin('tb_pacotes','tb_compra.cd_pacote','=','tb_pacotes.cd_pacote')
        ->orderBy('tb_imovel.created_at','DESC')
        ->whereNull('tb_imovel.deleted_at')
        ->limit(10)->get();
                        

        return view('admin.index',[ 'dash'=> $dash, 'imoveis'=>$recentes]);
    }
    
    public function anuncios(Request $request, $tipo = 'ativos', $typeS = ''){
        $back = $this->beforeCheckAdmin();
        if($back) return $back;
        $imoveis = Imovel::
        selectRaw("
            tb_imovel.nm_titulo,
            tb_imovel.created_at,
            IF(
                tb_pacotes.nm_titulo is not null, 
                tb_pacotes.nm_titulo, 
                IF(
                    ( cast( users.created_at as date ) > ( curdate() - interval 45 day ) ),
                    'TESTE',
                    IF(
                        users.is_admin = 1, 'ADMIN', 'INATIVO'
                    )
                )
            ) as status, 
            users.email as email,
            users.cd_document as doc,
            users.ic_juridica as jud,
            users.name as name

        ")        
        ->leftJoin('tb_tipo_imovel','tb_imovel.cd_tipo_imovel','=','tb_tipo_imovel.cd_tipo_imovel')
        ->leftJoin('tb_tipo_anuncio','tb_imovel.cd_tipo_anuncio','=','tb_tipo_anuncio.cd_tipo_anuncio')
        ->leftJoin('users','users.id','=','tb_imovel.cd_user')
        ->leftJoin('tb_compra',function($join){
            $join->on('users.id','=','tb_compra.cd_user');
            $join->where('tb_compra.ic_processado','=','1');
            $join->whereRaw(' tb_compra.created_at > ( curdate() - interval 31 day ) ');
        })
        ->leftJoin('tb_pacotes', 'tb_compra.cd_pacote','=','tb_pacotes.cd_pacote')
        ->orderBy('tb_imovel.created_at','DESC')
        ->whereNull('tb_imovel.deleted_at');
        switch ($tipo) {
            case 'ativos':
                $titulo="Ativos";
                $imoveis->whereRaw("
                    (( cast( users.created_at as date ) < ( curdate() - interval 45 day ) ) AND 
                    tb_compra.cd_compra is not null) or users.is_admin = 1
                ");
                break;
            case 'inativos':
                $titulo="Inativos";
                $imoveis->whereRaw("
                    ( cast( users.created_at as date ) < ( curdate() - interval 45 day ) ) AND 
                    tb_compra.cd_compra is null and users.is_admin = 0

                    ");
                break;
            case 'teste':
                $titulo="em período de testes";
                $imoveis->whereRaw("
                    ( cast( users.created_at as date ) > ( curdate() - interval 45 day ) ) AND 
                    tb_compra.cd_compra is null
                    ");
                break;
            
            default:
                # code...
                break;
        }


        $inputs = (object) $request->all(); 
        $filter = Imovel::selectRaw("MAX(vl_imovel) as max_value, Min(vl_imovel) as min_value");
        if(isset($inputs->cd_imovel)  && $inputs->cd_imovel){
            $imoveis = $imoveis->where('cd_imovel', $inputs->cd_imovel);
        }else{
            $inputs->cd_imovel = '';
            if(isset($inputs->cd_tipo_imovel)  && $inputs->cd_tipo_imovel){
                $imoveis = $imoveis->where('tb_imovel.cd_tipo_imovel', $inputs->cd_tipo_imovel);
            }else{
                $inputs->cd_tipo_imovel = null;
            }
            if(isset($inputs->u_search)  && $inputs->u_search){
                $imoveis = $imoveis->where(function($q) use ($inputs) {
                    $q->where('users.cd_document','like', '%'.$inputs->u_search.'%');
                    $q->orWhere('users.email','like', '%'.$inputs->u_search.'%');
                    $q->orWhere('users.name','like', '%'.$inputs->u_search.'%');
                });
            }else{
                $inputs->u_search = null;
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
        return view('admin.anuncios',[
            'tipo_imovel'=>TipoImovel::get(),
            'tipo_anuncio'=>TipoAnuncio::get(),
            'tipo_anunciante'=>TipoAnunciante::get(),
            'categoria_imovel'=>CategoriaImovel::get(),
            'titulo'=>$titulo,
            'imoveis'=> $imoveis->paginate(20),
            'imoveis_c'=>  $t_imob,
            'old_values'=>$inputs,
            'filter'=>$filter->first()
        ]);
        
    }


    public function view_areas($tipo){
        if($tipo=='comuns'){
            $titulo = 'Comuns';
            $areas = AreasComuns::get();
        }else{
            $titulo = 'Privativas';
            $areas = AreasPrivativas::get();
        }
        return view('admin.areas',['titulo'=>$titulo,'areas'=>$areas]);
    }

    public function save_areas(Request $request, $tipo = 'comuns'){
        if($tipo=='comuns'){
            $area = !$request->id ? new AreasComuns() : AreasComuns::find($request->id);
            $area->nm_areas_comuns = $request->titulo;
        }else{
            $area = !$request->id ? new AreasPrivativas() : AreasPrivativas::find($request->id);
            $area->nm_areas_privativas = $request->titulo;
        }
        $area->cd_categoria_imovel = $request->categoria;
        $area->save();
        return back();
    }

    public function excluir_areas(Request $request, $tipo, $id=''){
        if($tipo=='comuns'){
            $area = AreasComuns::find($id);
        }else{
            $area = AreasPrivativas::find($id);
        }
        $area->delete();
        return back();
    }

    public function view_pacotes(Request $request){
        $back = $this->beforeCheckAdmin();
        if($back) return $back;
        $pacotes = Pacote::paginate(20);
        return view('admin.pacotes',[
            'pacotes'=>$pacotes
        ]);
    }   

    public function alter_status_pacote($id){
        $back = $this->beforeCheckAdmin();
        if($back) return $back;
        $p = Pacote::find($id);
        $p->cd_status = ($p->cd_status?0:1);
        $p->save();
        return back();
    }
    public function excluir_pacote($id){
        $back = $this->beforeCheckAdmin();
        if($back) return $back;
        $p = Pacote::find($id);
        $p->delete();
        return back();
    }

    public function alter_pacote(Request $request){
        $back = $this->beforeCheckAdmin();
        if($back) return $back;
        $inputs = (object) $request->all(); 
        if($inputs->id){
            $p = Pacote::find($inputs->id);
        }else{
            $p = new Pacote();
        }
        $p->nm_titulo = $inputs->titulo;
        $p->vl_pacote = str_replace(',','.',str_replace('.','',$inputs->valor));
        $p->qt_anuncio = $inputs->anuncios;
        $p->qt_destaques = $inputs->destaques;
        return (string) $p->save(); 
    }

}
