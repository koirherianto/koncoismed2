<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Dpt;
use App\Models\Agama;
use App\Models\Relawan;
use App\Models\Suku;
use DB;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

class ChartApiController extends AppBaseController
{
    private $response = [];

    public function getChartPertumbuhanDpt()
    {
        $time_series_dpt = Dpt::select(DB::raw("concat(YEAR(created_at), '-',MONTH(created_at)) as monthyear"), DB::raw('count(*) as jumlah'))
            ->groupBy('monthyear')
            ->get('jumlah');

        if (empty($time_series_dpt)) {
            $this->response['success'] = false;
            return response()->json($this->response,200);
        }

        foreach ($time_series_dpt as $time) {
            $yearMonth = explode('-',$time["monthyear"]);
            $year = reset($yearMonth);
            $month = end($yearMonth);
            if(strlen($month) == 1){
                $month = '0' . $month;
            }
            $time['monthyear'] = $year . '-' . $month . '-01';
            // $time['jumlah'] = (float)sprintf("%.2f",$time['jumlah']);
        }
        return $this->sendResponse($time_series_dpt, 'Get Chart Pertumbuhan Dpt Succes');
    }
    
    public function getChartGender()
    {
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;
            $pieChartDptJenisKelamin = DB::table('pendukung')
                ->select(DB::raw('count(*) as jumlah, jenis_kelamin as nama'))
                ->where('kandidat_id',$idKandidat)
                ->groupBy('jenis_kelamin')
                ->get();
            
            if (empty($pieChartDptJenisKelamin)) {
                $this->response['success'] = false;
                return response()->json($this->response,200);
            }
            
            return $this->sendResponse($pieChartDptJenisKelamin, 'Get Chart Gender Succes');
        }
        
        if(Auth::user()->hasAnyRole(['relawan-free','relawan-premium'])){
            $genderDpt = [
                [
                    'nama' => 'pria',
                    'jumlah' => 0
                ],
                [
                    'nama' => 'wanita',
                    'jumlah' => 0
                ]
            ];
    
            $dataRelawans = Relawan::where('id',Auth::user()->relawan->id)->first();
    
            if (empty($dataRelawans)) {
                $this->response['success'] = false;
                return response()->json($this->response,200);
            }
    
            $data=[];
            $kosong = 0;
            foreach($dataRelawans->dpts as $item){
                if ($item->jenis_kelamin != null) {
                    $i = 0;
                    foreach($genderDpt as $agama){
                        if($agama['nama'] == $item->jenis_kelamin){
                            $genderDpt[$i]['jumlah']++;
                        }else{
                            $genderDpt[$i]['jumlah'] += 0;
                        }
                        $i++;
                    }
                }else{
                    $kosong++;
                }
            }
    
            foreach ($dataRelawans->descendants as $dataRelawan) {
                foreach($dataRelawan->dpts as $item){
                    if ($item->jenis_kelamin != null) {
                        $i = 0;
                        foreach($genderDpt as $agama){
                            if($agama['nama'] == $item->jenis_kelamin){
                                $genderDpt[$i]['jumlah']++;
                            }else{
                                $genderDpt[$i]['jumlah'] += 0;
                            }
                            $i++;
                        }
                    }else{
                        $kosong++;
                    }
                }
            }
            return $this->sendResponse($genderDpt, 'Get Chart Gender Succes');
        }
    }

    public function getChartAgama()
    {   //berlaku untuk admin kandidat
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;
            $pieChartDptAgama = DB::table('pendukung')
            ->join('agama', 'dpt.agama_id', '=', 'agama.id')
            ->select(DB::raw('count(*) as jumlah, agama.nama as nama'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('agama.nama')
            ->get();

            if (empty($pieChartDptAgama)) {
                $this->response['success'] = false;
                return response()->json($this->response,200);
            }

            return $this->sendResponse($pieChartDptAgama, 'Get Chart Agama Succes');
        }

        if(Auth::user()->hasAnyRole(['relawan-free','relawan-premium'])){
            $agamaDpt = Agama::all();
            $dataRelawans = Relawan::where('id',Auth::user()->relawan->id)->first();

            if (empty($agamaDpt)) {
                $this->response['success'] = false;
                return response()->json($this->response,200);
            }
            
            $data=[];
            foreach($dataRelawans->dpts as $item){
                foreach($agamaDpt as $agama){
                    if($agama->id == $item->agama_id){
                        $agama['jumlah']+=1;  
                    }else{
                        // $agama['jumlah']+=0; 
                    }
                }
            }
            foreach ($dataRelawans->descendants as $dataRelawan) {
                foreach($dataRelawan->dpts as $item){
                    foreach($agamaDpt as $agama){
                        if($agama->id == $item->agama_id){
                            $agama['jumlah']+=1;  
                        }else{
                            $agama['jumlah']+=0; 
                            // unset($agama);
                        }
                    }
                }
            }

            $agamaDpt2 = [];
            $i = 0;
            foreach ($agamaDpt as $item) {
                if ($item['jumlah'] != 0) {
                    $agamaDpt2[] = $item;
                }
                $i++;
            }

            // $this->response['success'] = true;
            // $this->response['data'] = $agamaDpt2;
            // return response()->json($this->response,200);
            return $this->sendResponse($agamaDpt2, 'Get Chart Agama Succes');
        }
        
    }

    public function getChartSuku()
    {
        //berlaku untuk admin kandidat
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;

            $barChartDptSuku = DB::table('pendukung')
            ->join('suku', 'dpt.suku_id', '=', 'suku.id')
            ->select(DB::raw('count(*) as jumlah, suku.nama as nama'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('suku.nama')
            ->orderBy('jumlah', 'desc')
            ->take(5)
            ->get();

            if (empty($barChartDptSuku)) {
                $this->response['success'] = false;
                return response()->json($this->response,200);
            }

            return $this->sendResponse($barChartDptSuku, 'Get Chart Suku Succes');
        }

        if(Auth::user()->hasAnyRole(['relawan-free','relawan-premium'])){
            $sukuDpt = Suku::all();
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();

            if (empty($sukuDpt)) {
                $this->response['success'] = false;
                return response()->json($this->response,200);
            }

            $kosong = 0;
            
            $data=[];
            foreach($relawanku->dpts as $item){
                $item->load('sukus');
                foreach($sukuDpt as $suku){
                    if ($item->sukus != null) {
                        if($suku->id == $item->sukus->id){
                            $suku['jumlah']+=1;  
                        }else{
                            $suku['jumlah']+=0; 
                        }
                    }else{
                        $kosong++;
                    }

                }
            }

            foreach ($relawanku->descendants as $dataRelawan) {
                foreach($dataRelawan->dpts as $item){
                    foreach($sukuDpt as $suku){
                        if ($item->sukus != null) {
                            if($suku->id == $item->sukus->id){
                                $suku['jumlah']+=1;  
                            }else{
                                $suku['jumlah']+=0; 
                            }
                        }else{
                            $kosong++;
                        }
                    }
                }
            }
            
            $sukuDpt2 = [];
            $i = 0;
            foreach ($sukuDpt as $item) {
                if ($item['jumlah'] != 0) {
                    $sukuDpt2[] = $item;
                }
                $i++;
            }

            if ($kosong != 0) {
                $sukuDpt2[] = [
                    'nama' => 'kosong',
                    'jumlah' => $kosong,
                ];
            }
            
            $this->response['success'] = true;
            $this->response['data'] = $sukuDpt2;
            return $this->sendResponse($sukuDpt2, 'Get Chart Suku Succes');
        }
        
    }

    public function getChartWilayah()
    {
        //berlaku untuk admin kandidat
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;
            $chartWilayahDpt = DB::table('pendukung')
                    ->select(DB::raw('count(*) as total, id_wilayah'))
                    ->where('kandidat_id',$idKandidat)
                    ->groupBy('id_wilayah')
                    ->orderBy('total','desc')
                    ->get();
            
            foreach ($chartWilayahDpt as $wilayah) {
                 $wilayah->wilayah = $this->wilayahById($wilayah->id_wilayah);
            }
        }

        //berlaku untuk admin relawan
        if(Auth::user()->hasAnyRole(['relawan-free','relawan-premium'])){
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();

            $wilayahs=[];
            foreach($relawanku->dpts as $dpt){
                array_key_exists($dpt['id_wilayah'],$wilayahs) ? $wilayahs[$dpt['id_wilayah']]++ : $wilayahs[$dpt['id_wilayah']] = 1;
            }

            //child dpt dari child relawan
            foreach ($relawanku->descendants as $relawans) {
                foreach($relawans->dpts as $dpt){      
                    array_key_exists($dpt['id_wilayah'],$wilayahs) ? $wilayahs[$dpt['id_wilayah']]++ : $wilayahs[$dpt['id_wilayah']] = 1;      
                }
            }

            $chartWilayahDpt = [];
            foreach ($wilayahs as $key => $value) {
                $chartWilayahDpt[] = [
                    'id_wilayah' => $key,
                    'total' => $value,
                    'wilayah' => $this->wilayahById($value),
                ];
            }
        }
        
        if (empty($chartWilayahDpt)) {
            $this->response['success'] = false;
            return response()->json($this->response,200);
        }

        return $this->sendResponse($chartWilayahDpt, 'Get Chart wilayah Succes');
    }

    public function getJumlahDpt()
    {
        $countDpt['jumlah'] = 0;
        $countDpt['jumlahPerempuan'] = 0;
        $countDpt['jumlahPria'] = 0;
        //berlaku untuk admin kandidat
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;
            $jumlahDpt = DB::table('pendukung')
                        ->select(DB::raw('count(*) as total'))
                        ->where('kandidat_id',$idKandidat)
                        ->first();

            // Menghitung jumlah perempuan dan laki-laki
            $jumlahPerempuan = DB::table('pendukung')
            ->where('kandidat_id', $idKandidat)
            ->where('jenis_kelamin', 'Perempuan')
            ->count();

            $jumlahPria = DB::table('pendukung')
                ->where('kandidat_id', $idKandidat)
                ->where('jenis_kelamin', 'Laki-laki')
                ->count();

            $countDpt['jumlahPerempuan'] += $jumlahPerempuan;
            $countDpt['jumlahPria'] += $jumlahPria;

            $countDpt['jumlah'] += $jumlahDpt->total;
        }

        //berlaku untuk relawan
        if(Auth::user()->hasAnyRole('relawan-free','relawan-premium')){

            $dptTree = 0;
            $jumlahPerempuan = 0;
            $jumlahPria = 0;
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();

            foreach($relawanku->dpts as $dpt){
                $dpt['jenis_kelamin'] == 'Perempuan' ? $jumlahPerempuan++ :  $jumlahPria++;
                $dptTree++;
            }

            foreach ($relawanku->descendants as $relawans) {
                foreach($relawans->dpts as $dpt){   
                    $dpt['jenis_kelamin'] == 'Perempuan' ? $jumlahPerempuan++ :  $jumlahPria++;   
                    $dptTree++;
                }
            }

            $countDpt['jumlah'] += $dptTree;
            $countDpt['jumlahPerempuan'] += $jumlahPerempuan;
            $countDpt['jumlahPria'] += $jumlahPria;

        }
        return $this->sendResponse($countDpt, 'Get jumlah dpt Succes');
    }

    public function getRangeUmurDpt(Request $request)
    {
        $rangeUmurDpt = [
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
            $dpts = DB::table('pendukung')
            ->select(DB::raw('tanggal_lahir'))
            ->where('kandidat_id',$idKandidat)
            ->get();

            $umurDpt=[];
            foreach($dpts as $dpt){
                $dpt->tanggal_lahir = Carbon::parse($dpt->tanggal_lahir)->age;
                array_push($umurDpt, $dpt);
            }

            foreach($umurDpt as $data){
                $tanggalLahir = $data->tanggal_lahir;
                $tanggalLahir < 21 ? $rangeUmurDpt['<20']++ : null;   
                $tanggalLahir >=21 && $tanggalLahir <=30 ? $rangeUmurDpt['21-30']++ : null;
                $tanggalLahir >=31 && $tanggalLahir <=40 ? $rangeUmurDpt['31-40']++ : null;
                $tanggalLahir >=41 && $tanggalLahir <=50 ? $rangeUmurDpt['41-50']++ : null;
                $tanggalLahir >=51 && $tanggalLahir <=60 ? $rangeUmurDpt['51-60']++ : null;
                $tanggalLahir >=61 && $tanggalLahir <=70 ? $rangeUmurDpt['61-70']++ : null;
                $tanggalLahir >=71 && $tanggalLahir <=80 ? $rangeUmurDpt['71-80']++ : null;
                $tanggalLahir >80 ? $rangeUmurDpt['>80']++ : null;
            };
        }

        if(Auth::user()->hasAnyRole('relawan-free','relawan-premium'))
        {
            $umurDpt=[];
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();

            foreach($relawanku->dpts as $dpt){
                $umur = Carbon::parse($dpt->tanggal_lahir)->age;
                array_push($umurDpt, ['tanggal_lahir' => $umur]);
            }
            
            foreach ($relawanku->descendants as $relawans) {
                foreach($relawans->dpts as $dpt){    
                    $umur = Carbon::parse($dpt->tanggal_lahir)->age;  
                    array_push($umurDpt, ['tanggal_lahir' => $umur]);
                }
            }
            
            foreach($umurDpt as $data){
                $tanggalLahir = $data['tanggal_lahir'];
                $tanggalLahir < 21 ? $rangeUmurDpt['<20']++ : null;   
                $tanggalLahir >=21 && $tanggalLahir <=30 ? $rangeUmurDpt['21-30']++ : null;
                $tanggalLahir >=31 && $tanggalLahir <=40 ? $rangeUmurDpt['31-40']++ : null;
                $tanggalLahir >=41 && $tanggalLahir <=50 ? $rangeUmurDpt['41-50']++ : null;
                $tanggalLahir >=51 && $tanggalLahir <=60 ? $rangeUmurDpt['51-60']++ : null;
                $tanggalLahir >=61 && $tanggalLahir <=70 ? $rangeUmurDpt['61-70']++ : null;
                $tanggalLahir >=71 && $tanggalLahir <=80 ? $rangeUmurDpt['71-80']++ : null;
                $tanggalLahir >80 ? $rangeUmurDpt['>80']++ : null;
            };
        }

        //out if
        $chartRangeUmur = [];
        foreach ($rangeUmurDpt as $key => $value) {
            $chartRangeUmur[] = [
                'ket' => $key,
                'total' => $value
            ];
        }

        return $this->sendResponse($chartRangeUmur, 'Get Range umur DPT Succes');
    }
}
