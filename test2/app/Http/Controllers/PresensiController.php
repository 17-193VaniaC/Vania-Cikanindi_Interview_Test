<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;

class PresensiController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $role = auth()->user()->fungsional;
        return view('presensi.home');
    }

    public function izinpresensi(){
        return view('presensi.izin');
    }

    protected function create(array $data)
    {
        $id = auth()->user()->id;
       
        Presensi::create([
            'id_user' => $id,
            'tanggal' => $data['tanggal'],
        ]);
    }

    protected function add(Request $request){
        $date_now = date("Y-m-d");
        $id = auth()->user()->id;

        if(Presensi::isExist($date_now, $id)){
            if(Presensi::isFinishedWorking($date_now, $id)){
                return redirect('/presensi')->with('error', 'Anda sudah melakukan presensi hari ini.');
            }
            else{
                Presensi::finishedWorking($date_now, $id);
                return redirect('/presensi')->with('status', 'Data kehadiran anda berhasil disimpan.');
            }
        }

        $presensi = new Presensi;
        $presensi->id_user = $id;
        $presensi->status = 'hadir';
        $presensi->tanggal = date("Y-m-d");;
        $presensi->save();
        return redirect('/presensi')->with('status', 'Data kehadiran anda berhasil disimpan');
    }
}
