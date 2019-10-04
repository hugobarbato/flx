<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AreasPrivativas;
use App\AreasComuns;
use App\Imovel;

class AdminController extends Controller
{
    private $user;
    private function beforeCheckAdmin(){
        $this->user = Auth::user();
        if($this->user->is_admin){
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
            DATE_FORMAT(tb_imovel.created_at,'%d/%M/%Y %H:%m') as created_at,
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
        ->orderBy('created_at','DESC')->limit(10)->get();

        dd($recentes);

        return view('admin.index',[ 'dash'=> $dash ]);
    }
    

}
