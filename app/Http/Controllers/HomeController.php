<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AreaController;
use Illuminate\Http\Request;
use App\Helper\Api_helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $allProvinsi = (new AreaController)->index();;
        return view('home',[
            'provinsi' => $allProvinsi,
        ]);
    }
}
