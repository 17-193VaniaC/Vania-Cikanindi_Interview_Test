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
            // $users = DB::query('users')->orderBy('id_user','desc')
            // ->join( 'presensi', DB::raw('users.id') , '=' , DB::raw('presensi.id_user') )
            // ->where('presensi.tanggal', '<=' , 'CURDATE()' )
            // ->select( 
            // DB::raw("users.id"), DB::raw("users.name"), DB::raw("users.fungsional"), DB::raw("users.struktural"), 
            // DB::raw("COUNT(presensi.status = 'hadir') as hadir"),
            // DB::raw("COUNT(presensi.status = 'izin') as izin"),
            // DB::raw("COUNT(presensi.status = 'sakit') as sakit"),
            // DB::raw("COUNT(presensi.status = 'alpha') as alpha"),
            // DB::raw("COUNT(presensi.status) as total"),
            // )
            // ->groupBy(DB::raw('users.id'), DB::raw('users.name'), DB::raw('users.fungsional'), DB::raw('users.struktural'))
            // ->get();
            // return response()->json($users);
            $query = "SELECT users.id, 
                    users.name,
                    users.fungsional, 
                    users.struktural, 
                    SUM(presensi.status='hadir') AS hadir, 
                    SUM(presensi.status='izin') AS izin,
                    SUM(presensi.status='sakit') AS sakit,
                    SUM(presensi.status='alpha') AS alpha, 
                    COUNT(*) AS total
                    FROM  presensi LEFT JOIN users 
                    ON presensi.id_user = users.id 
                    WHERE presensi.tanggal <= CURDATE()
                    GROUP BY users.id;";
             $exist =  DB::select($query)->get();
            return response()->json($users);

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
