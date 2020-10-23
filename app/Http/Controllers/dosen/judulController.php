<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Detail_dosbing;
use App\model\dosen;
use App\model\mahasiswa;
use App\model\Rancangan;
use App\model\Konsentrasi;

class judulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $data=Detail_dosbing:: join('rancangan', 'detail_dosbing.id_rancangan', '=', 'rancangan.id')
                        ->where('id_dosen', '=', $user_id)
                        ->where('rancangan.status', '1')
                        ->get();
        return view('dosen.judul', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user_id = auth()->user()->id;
        $data=Rancangan::where('id', $id)
                        ->first();
        return view('dosen.showjudul', compact('data','id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function updates(Request $request, $id)
    {
        //
        $data2 = Rancangan::where('id', $id)->first();
      
        Rancangan::where('id', $id)->update($request->only(
            'catatan_dosen'
            
        ));

        $user_id = auth()->user()->id;
        $data=Detail_dosbing:: join('rancangan', 'detail_dosbing.id_rancangan', '=', 'rancangan.id')
                        ->where('id_dosen', '=', $user_id)
                        ->where('rancangan.status', '1')
                        ->get();
        
    
        return redirect()->route('judul.index', compact('data'))->with('pesan','Berhasil Revisi');
        
    }
    public function updatess( $id)
    {
        //
        $data2 = Rancangan::where('id', $id)->first();
      
        Rancangan::where('id', $id)
          ->update(['status' => 3]
        );

        $user_id = auth()->user()->id;
        $data=Detail_dosbing:: join('rancangan', 'detail_dosbing.id_rancangan', '=', 'rancangan.id')
                        ->where('id_dosen', '=', $user_id)
                        ->where('rancangan.status', '1')
                        ->get();
        
    
        return redirect()->route('judul.index')->with('pesan','Berhasil Revisi');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
