<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Rancangan;
use App\model\mahasiswa;
use App\model\Konsentrasi;
use App\model\Detail_dosbing;
use App\model\dosen;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rancangan = Rancangan::all();
        return view('admin.admin',['rancangan' => $rancangan]);
    }

    public function dosbing()
    {
        $mahasiswa = Mahasiswa::where('status','0')->orderBy('id','asc')->get();
        $dosen = dosen::all();
        return view('admin.dosbing.index',['mahasiswa' => $mahasiswa, 'dosen' =>$dosen]);
    }

    public function dosbing_store(Request $request, $id)
    {
        Mahasiswa::where('id',$id)->UPDATE([
            'status' => '1',
        ]);

        Rancangan::create([
            'id_mahasiswa' => $id,
            'status' => "0",
        ]); 
        
        $id_rancangan = Rancangan::all()->last();

        Detail_dosbing::create([
            'id_rancangan' => $id_rancangan->id,
            'id_dosen' => request('dosbing'),
        ]); 
        
        return redirect()->route('admin.dosbing');
    }

    public function kelompok()
    {
        $dosen = dosen::orderBy('id','asc')->get();
        return view('admin.kelompok.index',['dosen' => $dosen]);
    }

    public function kelompok_show($id)
    {
        $detail_dosbing = Detail_dosbing::where('id_dosen',$id)->get();
        return view('admin.kelompok.show',['detail_dosbing' => $detail_dosbing]);
    }

    public function permohonan()
    {
        $rancangan = Rancangan::where('status','3')->get();
        return view('admin.permohonan.index',['rancangan' => $rancangan]);
    }

    public function permohonan_show($id)
    {
        $rancangan = Rancangan::where('id',$id)->first();
        return view('admin.permohonan.show',['rancangan' => $rancangan]);
    }

    public function permohonan_store($id)
    {
        Rancangan::where('id',$id)->UPDATE([
            'status' => '4',
        ]);
        
        return redirect()->route('admin.permohonan');
    }

}