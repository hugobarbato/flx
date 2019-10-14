<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pacote;
use App\AreasPrivativas;
use App\AreasComuns;
use App\Imovel;

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
    
    public function anuncios(Request $request, $tipo = 'ativos'){
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
        return view('admin.anuncios', [
            'titulo'=>$titulo,
            'imoveis'=>$imoveis->paginate(20)
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
