<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use App\Http\Controllers\AppBaseController;
use App\Models\Relawan;
use App\Models\DptMaster;
use App\Models\Dpt;
use DB;

class ChartRelawanApiController extends AppBaseController
{
    public function getChartPertumbuhanRelawan()
    {
        $time_series_dpt = Relawan::select(DB::raw("concat(YEAR(created_at), '-',MONTH(created_at)) as monthyear"), DB::raw('count(*) as jumlah'))
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
        return $this->sendResponse($time_series_dpt, 'Get Chart Pertumbuhan Relawan Succes');
    }

    public function getJumlahRelawan()
    {
        $countRelawan['jumlah'] = 0;
        $countRelawan['jumlahPerempuan'] = 0;
        $countRelawan['jumlahPria'] = 0;

        // Berlaku untuk admin kandidat
        if (Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')) {
            $idKandidat = Auth::user()->kandidat->id;
            $jumlahRelawan = DB::table('relawan')
                ->select(DB::raw('count(*) as total'))
                ->where('kandidat_id', $idKandidat)
                ->first();

            // Menghitung jumlah perempuan dan laki-laki
            $jumlahPerempuan = DB::table('relawan')
                ->where('kandidat_id', $idKandidat)
                ->where('jenis_kelamin', 'Perempuan')
                ->count();

            $jumlahPria = DB::table('relawan')
                ->where('kandidat_id', $idKandidat)
                ->where('jenis_kelamin', 'Laki-laki')
                ->count();

            $countRelawan['jumlahPerempuan'] += $jumlahPerempuan;
            $countRelawan['jumlahPria'] += $jumlahPria;

            $countRelawan['jumlah'] += $jumlahRelawan->total;
        }

        // Berlaku untuk relawan
        if (Auth::user()->hasAnyRole('relawan-free', 'relawan-premium')) {
            $relawanku = Relawan::where('id', Auth::user()->relawan->id)->first();
            $descendants = $relawanku->descendants;
            foreach ($descendants as $descendant) {
                if ($descendant->jenis_kelamin == 'Perempuan') {
                    $countRelawan['jumlahPerempuan']++;
                } elseif ($descendant->jenis_kelamin == 'Laki-laki') {
                    $countRelawan['jumlahPria']++;
                }
            }
            $countRelawan['jumlah'] += count($descendants);
        }

        //jumlah dpt & pendukung
        $countRelawan['jumlahDpt'] = DptMaster::countDptMaster();
        $jumlahPendukung = $countRelawan['jumlahPendukung'] = Dpt::countDukungan();

        //win rate
        $targetDukunganKandidat = Auth::user()->relawan->kandidat->target_pendukung ?? 1;
        $countRelawan['progressTargetDukungan'] = $jumlahPendukung/$targetDukunganKandidat*100;
        $countRelawan['targetJmlPendukung'] = $targetDukunganKandidat;
        $countRelawan['jmlTps'] = Auth::user()->relawan->kandidat->jumlah_tps ?? 0;
        $countRelawan['jmlAlokasiKursi'] = Auth::user()->relawan->kandidat->alokasi_kursi ?? 0;

        $countRelawan['kinerjaRelawanHarian'] = Dpt::kinerjaRelawanPerhari();
        $countRelawan['kinerjaRelawanHarian'] = number_format($countRelawan['kinerjaRelawanHarian'], 1);
        $countRelawan['kinerjaRelawanMingguan'] = Dpt::kinerjaRelawanPerminggu();
        $countRelawan['kinerjaRelawanMingguan'] = number_format($countRelawan['kinerjaRelawanMingguan'], 1);
        $countRelawan['kinerjaRelawanBulan'] = Dpt::kinerjaRelawanPerbulan();
        $countRelawan['kinerjaRelawanBulan'] = number_format($countRelawan['kinerjaRelawanBulan'], 1);

        return $this->sendResponse($countRelawan, 'Get jumlah relawan Success');
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
                $jenisKelamin->nama == 'Perempuan' ? $jenisKelamin->nama = 'wanita' : null;
                $jenisKelamin->nama == 'Laki-laki' ? $jenisKelamin->nama = 'pria' : null;
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
                $jenisKelamin == 'Perempuan' ? $genders['pria']++ : null;
                $jenisKelamin == 'Laki-laki' ? $genders['wanita']++ : null;
                $jenisKelamin != 'Perempuan' && $jenisKelamin != 'Laki-laki'? $genders['noData']++ : null;
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

    public function getUsiaGender()
    {
        $rangeUmurRelawan = [
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
            $relawans = DB::table('relawan')
                ->select(DB::raw('tanggal_lahir, jenis_kelamin'))
                ->where('kandidat_id', $idKandidat)
                ->get();

            $umurRelawan = [];
            foreach ($relawans as $relawan) {
                $relawan->tanggal_lahir = Carbon::parse($relawan->tanggal_lahir)->age;
                array_push($umurRelawan, $relawan);
            }

            foreach ($umurRelawan as $data) {
                $tanggalLahir = $data->tanggal_lahir;
                $jenisKelamin = $data->jenis_kelamin;
                if ($tanggalLahir < 20) {
                    $rangeUmurRelawan['<20'][$jenisKelamin]++;
                } elseif ($tanggalLahir >= 20 && $tanggalLahir <= 35) {
                    $rangeUmurRelawan['20-35'][$jenisKelamin]++;
                } elseif ($tanggalLahir >= 36 && $tanggalLahir <= 45) {
                    $rangeUmurRelawan['36-45'][$jenisKelamin]++;
                } elseif ($tanggalLahir >= 46 && $tanggalLahir <= 55) {
                    $rangeUmurRelawan['46-55'][$jenisKelamin]++;
                } elseif ($tanggalLahir > 55) {
                    $rangeUmurRelawan['>55'][$jenisKelamin]++;
                }
            }
        }

        // Berlaku untuk relawan
        if (Auth::user()->hasAnyRole('relawan-free', 'relawan-premium')) {
            $umurRelawan = [];
            $relawanku = Relawan::where('id', Auth::user()->relawan->id)->first();

            foreach ($relawanku->descendants as $relawans) {
                $umur = Carbon::parse($relawans->tanggal_lahir)->age;
                $jenisKelamin = $relawans->jenis_kelamin;
                array_push($umurRelawan, ['tanggal_lahir' => $umur, 'jenis_kelamin' => $jenisKelamin]);
            }

            foreach ($umurRelawan as $data) {
                $tanggalLahir = $data['tanggal_lahir'];
                $jenisKelamin = $data['jenis_kelamin'];
                if ($tanggalLahir < 20) {
                    $rangeUmurRelawan['<20'][$jenisKelamin]++;
                } elseif ($tanggalLahir >= 20 && $tanggalLahir <= 35) {
                    $rangeUmurRelawan['20-35'][$jenisKelamin]++;
                } elseif ($tanggalLahir >= 36 && $tanggalLahir <= 45) {
                    $rangeUmurRelawan['36-45'][$jenisKelamin]++;
                } elseif ($tanggalLahir >= 46 && $tanggalLahir <= 55) {
                    $rangeUmurRelawan['46-55'][$jenisKelamin]++;
                } elseif ($tanggalLahir > 55) {
                    $rangeUmurRelawan['>55'][$jenisKelamin]++;
                }
            }
        }

        // Output
        $chartRangeUmur = [];
        foreach ($rangeUmurRelawan as $key => $value) {
            $chartRangeUmur[] = [
                'ket' => $key,
                'totalPerempuan' => $value['Perempuan'],
                'totalLakiLaki' => $value['Laki-laki'],
                'total' => $value['Perempuan'] + $value['Laki-laki']
            ];
        }

        return $this->sendResponse($chartRangeUmur, 'Get Range umur Relawan Success');
    }

    public function getChartWilayahGender()
    {
        // Berlaku untuk admin kandidat
        if(Auth::user()->hasAnyRole('admin-kandidat-free', 'admin-kandidat-premium')){
            $idKandidat = Auth::user()->kandidat->id;
            $chartWilayahRelawan = DB::table('relawan')
                ->select(DB::raw('id_wilayah, SUM(CASE WHEN jenis_kelamin = "Laki-laki" THEN 1 ELSE 0 END) AS totalLakiLaki, SUM(CASE WHEN jenis_kelamin = "Perempuan" THEN 1 ELSE 0 END) AS totalPerempuan, COUNT(*) AS total'))
                ->where('kandidat_id', $idKandidat)
                ->groupBy('id_wilayah')
                ->get()->toArray();

            // return $chartWilayahRelawan;

            foreach ($chartWilayahRelawan as $key => $wilayah) {
                if ($wilayah->id_wilayah != null) {
                    $wilayah->wilayah = $this->wilayahById($wilayah->id_wilayah);
                } else {
                    unset($chartWilayahRelawan[$key]); // Menghapus elemen dengan id_wilayah null
                }
            }
    
            $chartWilayahRelawan = array_values($chartWilayahRelawan);
        }
        

        // Berlaku untuk admin relawan
        if(Auth::user()->hasAnyRole(['relawan-free','relawan-premium'])){
            
            $chartWilayahRelawan = DB::table('relawan')
            ->select(DB::raw('id_wilayah, SUM(CASE WHEN jenis_kelamin = "Laki-laki" THEN 1 ELSE 0 END) AS totalLakiLaki, SUM(CASE WHEN jenis_kelamin = "Perempuan" THEN 1 ELSE 0 END) AS totalPerempuan, COUNT(*) AS total'))
            ->where('relawan_id', Auth::user()->relawan->id)
            ->groupBy('id_wilayah')
            ->get();

            
            foreach ($chartWilayahRelawan as $key => $wilayah) {
                if ($wilayah->id_wilayah != null) {
                    $wilayah->wilayah = $this->wilayahById($wilayah->id_wilayah);
                } 
            }
        }

        if (empty($chartWilayahRelawan)) {
            $this->response['success'] = false;
            $this->response['message'] = 'Data Wilayah Gender Relawan Kosong';
            return response()->json($this->response, 200);
        }

        return $this->sendResponse($chartWilayahRelawan, 'Get Chart wilayah Gender Success');
    }

}
