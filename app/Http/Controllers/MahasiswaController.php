<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Detail_dosbing;
use App\model\dosen;
use App\model\mahasiswa;
use App\model\Rancangan;
use App\model\Konsentrasi;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
    {
        $status = config('status.status');
        $user_id = auth()->user()->id;
        $rancangan = rancangan::where('id_mahasiswa',$user_id)->get();
        $detail_dosbing = detail_dosbing::join('rancangan','rancangan.id','=','detail_dosbing.id_rancangan')
                                        ->where('rancangan.id_mahasiswa',$user_id)
                                        ->get();
        $dosen = dosen::all(); 
        return view('mahasiswa.mahasiswa', compact('rancangan','detail_dosbing','dosen','status'));
    }

    public function tambah($id){
        $rancangan=rancangan::where('id',$id)->first();
        return view('mahasiswa.mhs_tambah',compact('rancangan'));
    }

    public function storeide(Request $request){
        $user_id = auth()->user()->id;
        $id_counter = rancangan::count();
        $id_rancangan = $id_counter++;
        $rancangan = rancangan::insertGetId([
            'id' => $id_rancangan,
            'id_mahasiswa'=> $user_id,
            'deskripsi' => $request->deskripsi,
            'status' => 0
        ]);
        $detail_dosbing = detail_dosbing::insertGetId([
            'id_rancangan' => $id_rancangan,
            'id_dosen' => $request->dosen
        ]);

        return redirect()->route('list')->with('pesan','Berhasil Ajukan Ide');
    }

    public function store(Request $request, $id){
        $rancangan=rancangan::find($id);
        rancangan::where('id',$id)->update(['deskripsi'=>$request->deskripsi]);
        rancangan::where('id',$id)->update(['judul'=>$request->judul]);
        return redirect()->route('Mahasiswa.home')->with('pesan','Berhasil');
        
          

    }

    public function detail($id){
        $rancangan=rancangan::where('id',$id)->get();
        
        return view('mahasiswa.mhs_detail',compact('rancangan'));
        
    }

    public function edit($id){
        $rancangan=rancangan::where('id',$id)->first();
        return view('mahasiswa.mhs_edit',compact('rancangan'));
    }

    public function update(Request $request, $id){
        $rancangan=rancangan::find($id);
        rancangan::where('id',$id)->update(['judul'=>$request->judul]);
        return redirect()->route('Mahasiswa.home')->with('pesan','Berhasil');
    }

    public function list(){
        $user_id = auth()->user()->id; 
        $status_rancangan = config('rancangan.status_rancangan');
        $rancangan = rancangan::where('id_mahasiswa',$user_id)->get();
        $detail_dosbing = detail_dosbing::join('rancangan','rancangan.id','=','detail_dosbing.id_rancangan')
        ->where('rancangan.id_mahasiswa',$user_id)->get();
        $dosen = dosen::all();
        return view('mahasiswa.list', compact('rancangan','detail_dosbing','dosen','status_rancangan'));
    }

    public function tambahide(){
        $bidang= konsentrasi::all();

        // Load index view
        return view('mahasiswa.tambahide', compact("bidang"));
        
    }

    public function pilihdosbing($id){
        $dosen = dosen::where('id_kons',$id)->get();
         return view('mahasiswa.dosbing', compact("dosen"));

    }
    function upload(){

        $user_id = auth()->user()->id;
        $rancangan = rancangan::where('id_mahasiswa',$user_id)
                                ->where('status', 3)
                                ->get();
        
        return view('mahasiswa.upload', compact('rancangan'));
    }
    function supload($id){

        $user_id = auth()->user()->id;
        $rancangan = rancangan::where('id_mahasiswa',$user_id)
                                ->where('status', 3)
                                ->where('id', $id)
                                ->first();
            
        
        return view('mahasiswa.supload', compact('rancangan'));
    }
    function suploads(Request $request,$id){

        $user_id = auth()->user()->id;
        $rancangan = rancangan::where('id_mahasiswa',$user_id)
                                ->where('status', 3)
                                ->where('id', $id)
                                ->first();

        if($request->hasFile('file_surat')) {
    
        $folder = 'public/sertifikat';
        $filename = $rancangan->id .'_Surat_'.$rancangan->mahasiswa->nim.'.'. $request->file('file_surat')->getClientOriginalExtension();
        $filepath = $request->file_surat->storeAs($folder,$filename);
        $update= Rancangan::where('id',$rancangan->id)->update([
                            'file_surat' => $filename
                                        ]);
                        
        }
                               
                                
        return redirect()->route('mahasiswa.upload')->with('pesan','Berhasil Mengunggah File');
                        
        

                                
    }

}
