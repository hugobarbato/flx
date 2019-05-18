<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreasPrivativas;
use App\AreasComuns;
class AreasController extends Controller
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
    public function areas_html($id)
    {
        $areas_privativas = AreasPrivativas::where('cd_categoria_imovel','=',$id)
            ->orderBy('nm_areas_privativas')->get();
        $areas_comuns  = AreasComuns::where('cd_categoria_imovel','=',$id)
            ->orderBy('nm_areas_comuns')->get();
        return response()->json([
            'comuns'=>view(
                'layouts.components.areas_comuns',
                ['AreasComuns'=>$areas_comuns]
            )->render(),
            'privativas'=>view(
                'layouts.components.areas_privativas',
                ['AreasPrivativas'=>$areas_privativas]
            )->render()
        ]);
    }
    

}
