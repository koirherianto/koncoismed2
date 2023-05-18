<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Relawan;
use App\Models\Kecamatan;
use App\Models\Desa;
use DB;

class Peta extends Model
{
    public function allDataRelawan(){
        $results = DB::table('relawan')
        ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
        ->join('users', 'relawan.users_id', '=', 'users.id')
        ->select(DB::raw('users.name as nama, desa.latitude as latitude, 
            desa.longitude as longitude'))
        ->get();

        return $results;
    }


}
