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
                    'nama' => 'Laki-laki',
                    'jumlah' => 0
                ],
                [
                    'nama' => 'Perempuan',
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
            ->join('agama', 'pendukung.agama_id', '=', 'agama.id')
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

            return $this->sendResponse($agamaDpt2, 'Get Chart Agama Succes');
        }
        
    }

    public function getChartSuku()
    {
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;

            $barChartDptSuku = DB::table('pendukung')
            ->join('suku', 'pendukung.suku_id', '=', 'suku.id')
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

    public function getChartWilayahGender()
    {
        // Berlaku untuk admin kandidat
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;
            $chartWilayahDpt = DB::table('pendukung')
                ->select(DB::raw('id_wilayah, SUM(CASE WHEN jenis_kelamin = "Laki-laki" THEN 1 ELSE 0 END) AS totalLakiLaki, SUM(CASE WHEN jenis_kelamin = "Perempuan" THEN 1 ELSE 0 END) AS totalPerempuan, COUNT(*) AS total'))
                ->where('kandidat_id', $idKandidat)
                ->groupBy('id_wilayah')
                ->get();

            foreach ($chartWilayahDpt as $wilayah) {
                $wilayah->wilayah = $this->wilayahById($wilayah->id_wilayah);
            }
        }

        // Berlaku untuk admin relawan
        if(Auth::user()->hasAnyRole(['relawan-free','relawan-premium'])){
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();

            $wilayahs = [];
            foreach($relawanku->dpts as $dpt){
                if(!array_key_exists($dpt['id_wilayah'], $wilayahs)){
                    $wilayahs[$dpt['id_wilayah']] = [
                        'Laki-laki' => 0,
                        'Perempuan' => 0,
                    ];
                }
                $wilayahs[$dpt['id_wilayah']][$dpt['jenis_kelamin']]++;
            }

            foreach ($relawanku->descendants as $relawans) {
                foreach($relawans->dpts as $dpt){
                    if(!array_key_exists($dpt['id_wilayah'], $wilayahs)){
                        $wilayahs[$dpt['id_wilayah']] = [
                            'Laki-laki' => 0,
                            'Perempuan' => 0,
                        ];
                    }
                    $wilayahs[$dpt['id_wilayah']][$dpt['jenis_kelamin']]++;
                }
            }

            $chartWilayahDpt = [];
            foreach ($wilayahs as $key => $value) {
                $chartWilayahDpt[] = [
                    'id_wilayah' => $key,
                    'wilayah' => $this->wilayahById($key),
                    'totalLakiLaki' => $value['Laki-laki'],
                    'totalPerempuan' => $value['Perempuan'],
                    'total'  => $value['Perempuan'] + $value['Laki-laki']
                ];
            }
        }

        if (empty($chartWilayahDpt)) {
            $this->response['success'] = false;
            $this->response['message'] = 'Data Wilayah - Gender Pendukung Kosong';
            return response()->json($this->response, 200);
        }

        return $this->sendResponse($chartWilayahDpt, 'Get Chart wilayah Success');
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
            '<20' => [
                'Perempuan' => 0,
                'Laki-laki' => 0
            ],
            '20-35' => [
                'Perempuan' => 0,
                'Laki-laki' => 0
            ],
            '36-45' => [
                'Perempuan' => 0,
                'Laki-laki' => 0
            ],
            '46-55' => [
                'Perempuan' => 0,
                'Laki-laki' => 0
            ],
            '>55' => [
                'Perempuan' => 0,
                'Laki-laki' => 0
            ]
        ];

        // Berlaku untuk admin kandidat
        if (Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')) {
            $idKandidat = Auth::user()->kandidat->id;

            $dpts = DB::table('pendukung')
                        ->select(DB::raw('tanggal_lahir, jenis_kelamin'))
                        ->where('kandidat_id', $idKandidat)
                        ->get();

            foreach ($dpts as $dpt) {
                $umur = Carbon::parse($dpt->tanggal_lahir)->age;

                if ($umur < 20) {
                    $rangeUmurDpt['<20'][$dpt->jenis_kelamin]++;
                } elseif ($umur >= 20 && $umur <= 35) {
                    $rangeUmurDpt['20-35'][$dpt->jenis_kelamin]++;
                } elseif ($umur >= 36 && $umur <= 45) {
                    $rangeUmurDpt['36-45'][$dpt->jenis_kelamin]++;
                } elseif ($umur >= 46 && $umur <= 55) {
                    $rangeUmurDpt['46-55'][$dpt->jenis_kelamin]++;
                } elseif ($umur > 55) {
                    $rangeUmurDpt['>55'][$dpt->jenis_kelamin]++;
                }
            }
        }

        //berlaku untuk relawan
        if(Auth::user()->hasAnyRole('relawan-free','relawan-premium'))
        {
            $umurDpt=[];
            $relawanku = Relawan::where('id',Auth::user()->relawan->id)->first();

            foreach($relawanku->dpts as $dpt){
                $umur = Carbon::parse($dpt->tanggal_lahir)->age;
                array_push($umurDpt, ['tanggal_lahir' => $umur, 'jenis_kelamin' => $dpt->jenis_kelamin]);
            }
            
            foreach ($relawanku->descendants as $relawans) {
                foreach($relawans->dpts as $dpt){    
                    $umur = Carbon::parse($dpt->tanggal_lahir)->age;  
                    array_push($umurDpt, ['tanggal_lahir' => $umur, 'jenis_kelamin' => $dpt->jenis_kelamin]);
                }
            }
            
            foreach($umurDpt as $data){
                $tanggalLahir = $data['tanggal_lahir'];
                $jenisKelamin = $data['jenis_kelamin'];
                
                if ($tanggalLahir < 20) {
                    $rangeUmurDpt['<20'][$jenisKelamin]++;
                } elseif ($tanggalLahir >= 20 && $tanggalLahir <= 35) {
                    $rangeUmurDpt['20-35'][$jenisKelamin]++;
                } elseif ($tanggalLahir >= 36 && $tanggalLahir <= 45) {
                    $rangeUmurDpt['36-45'][$jenisKelamin]++;
                } elseif ($tanggalLahir >= 46 && $tanggalLahir <= 55) {
                    $rangeUmurDpt['46-55'][$jenisKelamin]++;
                } elseif ($tanggalLahir > 55) {
                    $rangeUmurDpt['>55'][$jenisKelamin]++;
                }
            };
        }

        //out if
        $chartRangeUmur = [];
        foreach ($rangeUmurDpt as $key => $value) {
            $chartRangeUmur[] = [
                'ket' => $key,
                'totalPerempuan' => $value['Perempuan'],
                'totalLakiLaki' => $value['Laki-laki'],
                'total' => $value['Perempuan'] + $value['Laki-laki']
            ];
        }

        return $this->sendResponse($chartRangeUmur, 'Get Range umur DPT Succes');
    }

}
