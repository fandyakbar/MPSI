<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Detail_dosbing;
use App\model\dosen;
use App\model\mahasiswa;
use App\model\Rancangan;
use App\model\Konsentrasi;

class DosenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $data=Detail_dosbing::where('id_dosen', '=', $user_id)
                        ->get();
                        $status_rancangan = config('rancangan.status_rancangan');
        return view('dosen.dosen', compact('data', 'status_rancangan'));
    }
    public function grup()
    {
        $user_id = auth()->user()->id;
        $uname = auth()->user()->nama;
        $data=Detail_dosbing::join('rancangan', 'detail_dosbing.id_rancangan', '=', 'rancangan.id')
                        ->where('detail_dosbing.id_dosen', '=', $user_id)
                        ->where('rancangan.status','!=','0')
                        ->where('rancangan.status','!=','2')
                        ->get();
        $status_rancangan = config('rancangan.status_rancangan');
        return view('dosen.grup', compact('data', 'status_rancangan','uname'));
    }
    public function terima($id){
        $user_id = auth()->user()->id;
        $data=Detail_dosbing::where('id_dosen', '=', $user_id)
                        ->get();
        $updates = Rancangan::where('id', $id)->first();
        Rancangan::where('id', $id)
          ->update(['status' => 1]);
        
        return redirect()->route('Dosen.home', compact('data'));
    
    }
    public function tolak($id){
        $data = Rancangan::where('id',$id)->first();


        return view('dosen.tolak', compact('data','id'));
        
    }
    public function tolaks(Request $request, $id){

        $updates = Rancangan::where('id', $id)->first();
        Rancangan::where('id', $id)
          ->update(['status' => 2],
          ['catatan_dosen' => $request->catatan]);
         
        Rancangan::where('id', $id)->update($request->only(
            'catatan_dosen'
          
        ));
        
        return redirect()->route('Dosen.home', compact('data'));
       
    }
}