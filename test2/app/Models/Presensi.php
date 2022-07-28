<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Presensi extends Model
{
    use HasFactory;
    public $table = "presensi";
    public $timestamps = false;
   

    protected $fillable = [
        'id',
        'id_user',
        'status',
        'tanggal',
        'jam_keluar',
    ];

    public static function finishedWorking($date, $id){
        $time_now = date("Y-m-d H:i:s");
        $update =  DB::table('presensi')
                        ->where([
                            ['id_user', strval($id)],
                            ['tanggal', strval($date)]
                        ])
                        ->update(['jam_keluar' => $time_now]);
        // DB::statement(DB::raw('update presensi set jam_keluar = time where id_user = id', ['time' => $time_now, 'id'=>$id]));
    }

    public static function getAttendanceReport(){
        $query = "SELECT users.id, users.name, users.fungsional, users.struktural,
                    sum(case when presensi.status = 'masuk' then 1 else 0 end) as masuk,
                    sum(case when presensi.status = 'izin' then 1 else 0 end) as izin,
                    sum(case when presensi.status = 'sakit' then 1 else 0 end) as sakit,
                    sum(case when presensi.status = 'alpha' then 1 else 0 end) as alpha,
                    COUNT(presensi.status) as total
                    from presensi, users
                    WHERE presensi.id_user=users.id
                    group by presensi.id_user;";
         return $exist =  DB::select($query)->get();
    }
    public static function isExist($date, $id){
        $date_now = strval(date("Y-m-d"))."'";
        $qIsExist = "select count(id) as n from presensi WHERE presensi.tanggal = '";
        $idUser = "' and id_user = " . $id .";";

        $query = $qIsExist . strval($date) . $idUser;
        $exist =  DB::select($query);
        $exist = $exist[0]->n;
        if($exist > 0){
            return true;
        }
        return false;
    }

    public static function isFinishedWorking($date, $id){
        $date_now = strval(date("Y-m-d"))."'";
        $qIsExist = "select jam_keluar from presensi WHERE presensi.tanggal = '";
        $idUser = "' and id_user = " . $id .";";
        $query = $qIsExist . strval($date) . $idUser;
        $exist =  DB::select($query);
        $exist = $exist[0]->jam_keluar;
        if($exist != NULL){
            return true;
        }
        return false;
    }

    public static function isPast($date){
        $date_now = date("Y-m-d");
        if($date < $date_now){
            return true;
        }
        return false;
    }

    protected static function getLastID(){
        return DB::select('select id from presensi ORDER BY id DESC LIMIT 1;');
    }

}
