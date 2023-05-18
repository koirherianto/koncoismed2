<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use App\Http\Controllers\AppBaseController;
use App\Models\Relawan;
use DB;

class ChartRelawanApiController extends AppBaseController
{
    public function getJumlahRelawan(){

        $countRelawan['jumlah'] = 0;

        //berlaku untuk admin kandidat
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;
            $jumlahRelawan = DB::table('relawan')
                        ->select(DB::raw('count(*) as total'))
                        ->where('kandidat_id',$idKandidat)
                        ->first();    
            $countRelawan['jumlah'] += $jumlahRelawan->total;
        }

        //berlaku untuk relawan
        if(Auth::user()->hasAnyRole('relawan-free','relawan-premium')){
            $relawanTree = 0;
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();
            $countRelawan['jumlah'] += count($relawanku->descendants);
        }

        return $this->sendResponse($countRelawan, 'Get jumlah relawan Succes');        
    }

    public function getChartGenderRelawan()
    {
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;
            $jenisKelamins = DB::table('relawan')
            ->select(DB::raw('count(*) as jumlah, jenis_kelamin as nama'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('jenis_kelamin')
            ->get();

            foreach ($jenisKelamins as $jenisKelamin) {
                $jenisKelamin->nama == 'P' ? $jenisKelamin->nama = 'wanita' : null;
                $jenisKelamin->nama == 'L' ? $jenisKelamin->nama = 'pria' : null;
                is_null($jenisKelamin->nama) ? $jenisKelamin->nama = 'noData' : null;
            }

            return $this->sendResponse($jenisKelamins, 'Get chart gender relawan Success');   
        }
        

        if(Auth::user()->hasAnyRole(['relawan-free','relawan-premium'])){
            $genders = [
                'pria' => 0,
                'wanita' => 0,
                'noData' => 0,
            ];
    
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();
    
            if (empty($genders)) {
                $this->response['success'] = false;
                return response()->json($this->response,200);
            }

            foreach ($relawanku->descendants as $relawan) {
                $jenisKelamin = $relawan->jenis_kelamin;
                $jenisKelamin == 'P' ? $genders['pria']++ : null;
                $jenisKelamin == 'L' ? $genders['wanita']++ : null;
                $jenisKelamin != 'P' && $jenisKelamin != 'L'? $genders['noData']++ : null;
            }

            // hilangin yang n0ll
            $chartJenisKelamin = [];
            foreach ($genders as $key => $value) {
                if ($value == 0) {
                    unset($genders[$key]);
                }else {
                    $chartJenisKelamin[] = [
                        'nama' => $key,
                        'jumlah' => $value
                    ];
                }
            }

            return $this->sendResponse($chartJenisKelamin, 'Get Chart Gender Relawan Succes');
        }
    }

    public function getStatusPerkawinanRelawan()
    {
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;
            //pie chart Relawan berdasarkan status_perkawinan
            $statusPerkawaninans = DB::table('relawan')
            ->select(DB::raw('count(*) as total, status_perkawinan as status'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('status_perkawinan')
            ->get();

            foreach ($statusPerkawaninans as $statusPerkawaninan) {
                $status = $statusPerkawaninan->status;
                $status != "Pernah" && $status != "Sudah" && $status != "Belum" ? $statusPerkawaninan->status = 'noData' : null;
            }

            return $this->sendResponse($statusPerkawaninans, 'Get Chart Status Perkawinan Relawan Succes');
        }

        if(Auth::user()->hasAnyRole(['relawan-free','relawan-premium'])){
            $statusPerkawaninan = [
                'Pernah' => 0,
                'Sudah' => 0,
                'Belum' => 0,
                'noData' => 0,
            ];
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();
    
            if (empty($relawanku)) {
                $this->response['success'] = false;
                return response()->json($this->response,200);
            }

            foreach ($relawanku->descendants as $relawan) {
                $status = $relawan->status_perkawinan;
                $status === "Pernah" ? $statusPerkawaninan['Pernah']++ : null;
                $status === "Sudah" ? $statusPerkawaninan['Sudah']++ : null;
                $status === "Belum" ? $statusPerkawaninan['Belum']++ : null;
                $status != "Pernah" && $status != "Sudah" && $status != "Belum" ? $statusPerkawaninan['noData']++ : null;
            }

            //hilangin yang noll
            $chartStatusPerkawinan = [];
            foreach ($statusPerkawaninan as $key => $value) {
                if ($value == 0) {
                    unset($statusPerkawaninan[$key]);
                }else{
                    $chartStatusPerkawinan[] = [
                        'status' => $key,
                        'total' => $value
                    ];
                }
            }

            return $this->sendResponse($chartStatusPerkawinan, 'Get Chart Status Penikahan Relawan Succes');
        }
    }

    public function getRangeUmurRelawan()
    {
        $rangeUmurRelawan = [
            '<20' => 0,
            '21-30' => 0,
            '31-40' => 0,
            '41-50' => 0,
            '51-60' => 0,
            '61-70' => 0,
            '71-80' => 0,
            '>80' => 0,
        ];

        //berlaku untuk admin kandidat
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium'))
        {
            $idKandidat = Auth::user()->kandidat->id;
            $relawans = DB::table('relawan')
            ->select(DB::raw('tanggal_lahir'))
            ->where('kandidat_id',$idKandidat)
            ->get();

            $umurRelawan=[];
            foreach($relawans as $relawan){
                $relawan->tanggal_lahir = Carbon::parse($relawan->tanggal_lahir)->age;
                array_push($umurRelawan, $relawan);
            }

            foreach($umurRelawan as $data){
                $tanggalLahir = $data->tanggal_lahir;
                $tanggalLahir < 21 ? $rangeUmurRelawan['<20']++ : null;   
                $tanggalLahir >=21 && $tanggalLahir <=30 ? $rangeUmurRelawan['21-30']++ : null;
                $tanggalLahir >=31 && $tanggalLahir <=40 ? $rangeUmurRelawan['31-40']++ : null;
                $tanggalLahir >=41 && $tanggalLahir <=50 ? $rangeUmurRelawan['41-50']++ : null;
                $tanggalLahir >=51 && $tanggalLahir <=60 ? $rangeUmurRelawan['51-60']++ : null;
                $tanggalLahir >=61 && $tanggalLahir <=70 ? $rangeUmurRelawan['61-70']++ : null;
                $tanggalLahir >=71 && $tanggalLahir <=80 ? $rangeUmurRelawan['71-80']++ : null;
                $tanggalLahir >80 ? $rangeUmurRelawan['>80']++ : null;
            };
        }

        if(Auth::user()->hasAnyRole('relawan-free','relawan-premium'))
        {
            $umurRelawan=[];
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();

            foreach ($relawanku->descendants as $relawans) {
                $umur = Carbon::parse($relawans->tanggal_lahir)->age;  
                array_push($umurRelawan, ['tanggal_lahir' => $umur]);
            }
            
            foreach($umurRelawan as $data){
                $tanggalLahir = $data['tanggal_lahir'];
                $tanggalLahir < 21 ? $rangeUmurRelawan['<20']++ : null;   
                $tanggalLahir >=21 && $tanggalLahir <=30 ? $rangeUmurRelawan['21-30']++ : null;
                $tanggalLahir >=31 && $tanggalLahir <=40 ? $rangeUmurRelawan['31-40']++ : null;
                $tanggalLahir >=41 && $tanggalLahir <=50 ? $rangeUmurRelawan['41-50']++ : null;
                $tanggalLahir >=51 && $tanggalLahir <=60 ? $rangeUmurRelawan['51-60']++ : null;
                $tanggalLahir >=61 && $tanggalLahir <=70 ? $rangeUmurRelawan['61-70']++ : null;
                $tanggalLahir >=71 && $tanggalLahir <=80 ? $rangeUmurRelawan['71-80']++ : null;
                $tanggalLahir >80 ? $rangeUmurRelawan['>80']++ : null;
            };
        }

        //out if
        $chartRangeUmur = [];
        foreach ($rangeUmurRelawan as $key => $value) {
            $chartRangeUmur[] = [
                'ket' => $key,
                'total' => $value
            ];
        }

        return $this->sendResponse($chartRangeUmur, 'Get Range umur Relawan Succes');
    }
}
