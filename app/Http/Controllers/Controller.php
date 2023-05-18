<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Provinsi;
use App\Models\Kabkota;
use App\Models\Kecamatan;
use App\Models\Desa;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function wilayahById(int $id)
    {
        $wilayah = Provinsi::find($id);
        if (!is_null($wilayah)) {
            $wilayah['tingkat'] = 'provinsi';
            // $wilayah['nama'] = $wilayah['provinsi'];
            return $wilayah;
        }

        $wilayah = Kabkota::find($id);
        if (!is_null($wilayah)) {
            $wilayah['tingkat'] = 'kab/kota';
            // $wilayah['nama'] = $wilayah['kabkota'];
            return $wilayah;
        }

        $wilayah = Kecamatan::find($id);
        if (!is_null($wilayah)) {
            $wilayah['tingkat'] = 'kecamatan';
            // $wilayah['nama'] = $wilayah['kecamatan'];
            return $wilayah;
        }

        $wilayah = Desa::find($id);
        if (!is_null($wilayah)) {
            $wilayah['tingkat'] = 'kel/desa';
            // $wilayah['nama'] = $wilayah['desa'];
            return $wilayah;
        }
    }

    public function namaWilayaById($tingkat, $id)
    {
       if ($tingkat === "provinsi") {
        $wilayah = Provinsi::find($id);
        // $wilayah['nama'] = $wilayah['provinsi'];
       }elseif ($tingkat === "kab/kota") {
        $wilayah = Kabkota::find($id);
        // $wilayah['nama'] = $wilayah['kab/kota'];
       }elseif ($tingkat === "kecamatan") {
        $wilayah = Kecamatan::find($id);
        // $wilayah['nama'] = $wilayah['kecamatan'];
       }else{
        $wilayah = Desa::find($id);
        // $wilayah['nama'] = $wilayah['desa'];
       }
       $wilayah['tingkat'] = $tingkat;
       return $wilayah;
    }

    public function genderRelawanById($idEnum)
    {
        $gender = $idEnum == 1 || $idEnum == 'P' || $idEnum == 'Perempuan' ? 'Perempuan' : 'Laki-laki';

        return $gender;
    }

    public function statusPernikahanById($idEnum)
    {
        if($idEnum == 1 || $idEnum == 'P' || $idEnum == 'Pernah' ){ 
            $status = 'Pernah';
        };
        if($idEnum == 2 || $idEnum == 'S' || $idEnum == 'Sudah' ){ 
            $status = 'Sudah';
        }
        if($idEnum == 3 || $idEnum == 'B' || $idEnum == 'Belum' ){ 
            $status = 'Belum';
        }

        return $status;
    }
}
