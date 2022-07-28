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
         return $exist =  DB::select($query);
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

}
