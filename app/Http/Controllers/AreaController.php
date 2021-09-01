<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Api_helper;

class AreaController extends Controller
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
        $allProvinsi = Api_helper::GetApi('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        return $allProvinsi->provinsi;
    }

    public function getKota(Request $request){
        $allKota = Api_helper::GetApi('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='.$request->id_provinsi);
        return $allKota->kota_kabupaten;
    }

    public function getKecamatan(Request $request){
        $allKecamatan = Api_helper::GetApi('http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota='.$request->id_kota);
        return $allKecamatan->kecamatan;
    }

    public function getKelurahan(Request $request){
        $allKelurahan = Api_helper::GetApi('http://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan='.$request->id_kecamatan);
        return $allKelurahan->kelurahan;
    }
}
