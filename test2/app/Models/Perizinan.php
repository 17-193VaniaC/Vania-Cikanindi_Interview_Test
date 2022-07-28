<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Perizinan extends Model
{
    use HasFactory;
    public $table = "perizinan";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_perizinan',
        'jenis',
        'approved',
    ];
}
