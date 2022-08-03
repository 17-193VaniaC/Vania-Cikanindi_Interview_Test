<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Perizinan;
use Illuminate\Support\Facades\DB;

class AttendancerecapController extends Controller
{
      /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('auth');
    //    $this->middleware('Role:manajemen');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {
       return view('presensi.report');
   }

   public function viewAttendanceApproval(){
        return view('perizinan.approval');
   }

   public function approveThis(Request $request){
        try{
            $id_perizinan = $request->get('id_perizinan');
            Perizinan::where('id', '=', $id_perizinan)
                ->update(['approved'=> 1]);
            $datas = DB::table('perizinan')->where('id','=',$id_perizinan)->select('id_presensi', 'jenis')->first();
            $id_presensi = $datas->id_presensi;
            $jenis = $datas->jenis;
            Presensi::where('id', $id_presensi )->update(['status' => $jenis]);
        }
        catch(Exception $e){
            Log::error($e);
        }

   }

   public function getReport(){
        try{
            $exist =  Presensi::getAttendanceReport();
            return response()->json($exist);

        }
        catch(Exception $e){
            Log::error($e);
        }
   }

   public function getPermissionList(){
    try{
        $izin = DB::table('perizinan')->orderBy('id','desc')
        ->join( 'presensi', 'perizinan.id_presensi' , '=' , 'presensi.id' )
        ->where('perizinan.approved', '=' , 0 )
        ->join( 'users', 'presensi.id_user' , '=' , 'users.id')
        ->select( "users.id", "users.name", "presensi.tanggal","perizinan.id as id_perizinan", "perizinan.jenis", "perizinan.id_presensi")
        ->get();
        return response()->json($izin);
    }
    catch(Exception $e){
        Log::error($e);
    }
    }

}
