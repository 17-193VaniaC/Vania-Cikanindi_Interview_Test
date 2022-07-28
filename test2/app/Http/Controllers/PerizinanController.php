<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Perizinan;

class PerizinanController extends Controller
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
   public function index()
   {
        return view('presensi.izin');
   }

   protected function add(Request $request){
        $id = auth()->user()->id;   
        $lastID = NULL;
        
        if(Presensi::isPast($request->tanggal)){
            return redirect('/izin')->with('error', 'Harap periksa kembali tanggal perizinan Anda. Tanggal tidak boleh kurang dari hari ini. ');
        }
        
        if(Presensi::isExist($request->tanggal, $id)){
            return redirect('/izin')->with('error', 'Sudah terdapat data kehadiran pada tanggal tersebut.');
        }

        $lastID = Presensi::getLastID();
        if($lastID==NULL){
            $lastID = 1;
        }
        else{
            $lastID = $lastID[0]->id +1;
        }
        
        $presensi = new Presensi;
        $presensi->id = $lastID;
        $presensi->id_user =  strval(sprintf( "%08d", (int)$id));
        $presensi->tanggal = $request->tanggal;
        $presensi->status = 'alpha';
        $presensi->save();

        $perizinan = new Perizinan;
        $perizinan->id_presensi = $presensi->id;
        $perizinan->jenis = $request->jenis;
        $perizinan->approved = 0;
        $perizinan->save();

        return redirect('/izin')->with('status', 'Izin berhasil diajukan');
    }

}
