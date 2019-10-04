<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreasPrivativas;
use App\AreasComuns;
class AdminController extends Controller
{
     
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('admin.index');
    }
    

}
