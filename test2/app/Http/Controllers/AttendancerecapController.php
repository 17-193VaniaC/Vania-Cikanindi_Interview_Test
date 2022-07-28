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
            $id_perizinan = $request->get('id');
            return redirect('/home')->with('izin', $id_perizinan);
            Perizinan::where('id', $request)->update('approved', 1);
            $datas = DB::table('perizinan')->where('id_perizinan','=',$id_perizinan)->select('id_presensi', 'jenis')->first();
            $id_presensi = $datas->id_presensi;
            $jenis = $datas->jenis;
            Presensi::where('id', $id_presensi )->update('status', $jenis);
        }
        catch(Exception $e){
            Log::error($e);
        }

   }

   public function getReport(){
        try{
            $query = "SELECT users.id, users.name, users.fungsional, users.struktural,
                sum(case when presensi.status = 'masuk' then 1 else 0 end) as masuk,
                sum(case when presensi.status = 'izin' then 1 else 0 end) as izin,
                sum(case when presensi.status = 'sakit' then 1 else 0 end) as sakit,
                sum(case when presensi.status = 'alpha' then 1 else 0 end) as alpha,
                COUNT(presensi.status) as total
                from presensi, users
                WHERE presensi.id_user=users.id
                and presensi.tanggal <= CURDATE()
                group by presensi.id_user;";
            $exist =  DB::select($query)->get();
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
        ->select( "users.id", "users.name", "presensi.tanggal", "perizinan.jenis", "perizinan.id_presensi")
        ->get();
        return response()->json($izin);
    }
    catch(Exception $e){
        Log::error($e);
    }
    }

}
