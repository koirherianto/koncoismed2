<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relawan;
use App\Models\Dpt;
use App\Models\JenisKandidat;
use App\Models\User;
use App\Models\Suku;
use App\Models\Agama;
use App\Models\Kandidat;
use App\Models\Person;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use HasRoles;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $id = Auth::id();
        //headline super-admin
        if (Auth::user()->hasRole('super-admin')) {
            // headline dashboard
            $jumlah_relawan = Relawan::count();
            $jumlah_dpt = Dpt::count();
            $jumlah_kandidat = Kandidat::count();

            // column chart perbandingan jumlah kandidat bersdarkan jenis kandidat
            $perbandingan_kandidat = DB::table('kandidat')
            ->join('jenis_kandidat', 'kandidat.jenis_kandidat_id', '=', 'jenis_kandidat.id')
            ->select(DB::raw('count(*) as pk_count, jenis_kandidat.nama as jenis_kandidat_id'))
            ->groupBy('jenis_kandidat.nama')
            ->get();

            // pie chart perbandingan jumlah semua person berdasarkan jenis kelamin
            $pieChartRelawanJK = DB::table('person')
            ->select(DB::raw('count(*) as pcrjk, jenis_kelamin'))
            ->groupBy('jenis_kelamin')
            ->get();

            //time series total kandidat
            $time_series_kandidat = DB::table('kandidat')
            ->select(DB::raw("concat(MONTH(created_at), '-',YEAR(created_at)) as monthyear"), DB::raw('count(*) as jumlah'))
            ->groupBy('monthyear')
            ->get();

            //time series total relawan
            $time_series_relawan = DB::table('relawan')
            ->select(DB::raw("concat(MONTH(created_at), '-',YEAR(created_at)) as monthyear"), DB::raw('count(*) as jumlah'))
            ->groupBy('monthyear')
            ->get();

            return view('dashboard.home', compact('jumlah_relawan', 'jumlah_dpt','jumlah_kandidat'
            ,'perbandingan_kandidat','pieChartRelawanJK','time_series_kandidat', 'time_series_relawan'));
        }

        elseif(Auth::user()->hasRole(['admin-kandidat-free', 'admin-kandidat-premium'])){

            //ambil id kandidat
            $idKandidat = Auth::user()->kandidat->id;

            //ambil jumlah relawan berdasarkan kandidat_id
            $jumlah_relawan = Relawan::where('kandidat_id',$idKandidat)->count();
            
            //ambil relawan id sendiri
            $idRelawan = Auth::user()->relawan->id;

            //mengambil jumlah +dpt hari ini menggunakan carbon
            $dptNow = Dpt::whereDate('created_at', Carbon::today())->count();

            //mengambil jumlah +relawan hari ini pakai carbon
            $relawanNow = DB::table('relawan')
            ->where('kandidat_id',$idKandidat)
            ->whereDate('created_at', Carbon::today())
            ->count();

            $relawan = Relawan::where('id',Auth::user()->relawan->id)->with('relawans')->first();
            //tarik data DPT
            $relawanDpt = Relawan::where('users_id', Auth::user()->id)->first();
            $dpts=[];
            foreach($relawan->descendants as $key=> $item){
                if(!$item->dpts->isEmpty()){
                    $dpts[] = $item->dpts;
                }
            }
             //return $dpts;

             //menarik total DPT
             $jumlah_dpt = Dpt::where('kandidat_id',$idKandidat)->count();
            //  $tampungdata = [];
            //  $i = 0;
            
            //  $jumlah_dpt = 0;
            //  foreach ($dpts as $value) {
            //     $i = count($value);
            //     $tampungdata[] = $value;
            //     for ($k=0; $k < $i; $k++) { 
            //         $jumlah_dpt++;
            //     }
            //  }

             //Line chart Pertumbuhan DPT Berdasarkan bulan tahun
            $time_series_dpt = DB::table('pendukung')
            ->select(DB::raw("concat(MONTH(created_at), '-',YEAR(created_at)) as monthyear"), 
            DB::raw('count(*) as jumlah'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('monthyear')
            ->get();

            //visualisasi dpt berdasarkan wilayah
            $barChartDptIdWilayah = DB::table('pendukung')
            ->join('desa', 'pendukung.id_wilayah', '=', 'desa.id')
            ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('id_wilayah')
            ->orderBy('total','desc')
            ->get();

            //visualisasi dpt berdasarkan sukunya
            $barChartDptSuku = DB::table('pendukung')
            ->join('suku', 'pendukung.suku_id', '=', 'suku.id')
            ->select(DB::raw('count(*) as total, suku.nama as suku'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('suku.nama')
            ->orderBy('total', 'desc')
            ->take(10)
            ->get();

            //visualisasi dpt berdasarkan agama dengan pie chart
            $pieChartDptAgama = DB::table('pendukung')
            ->join('agama', 'pendukung.agama_id', '=', 'agama.id')
            ->select(DB::raw('count(*) as total, agama.nama as agama_id'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('agama.nama')
            ->get();

            //pie chart Relawan berdasarkan jenis-kelaminnya
            $pieChartRelawanJenisKelamin = DB::table('relawan')
            ->select(DB::raw('count(*) as total, jenis_kelamin'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('jenis_kelamin')
            ->get();
            
            //pie chart Relawan berdasarkan status_perkawinan
            $pieChartRelawanStatusPerkawinan = DB::table('relawan')
            ->select(DB::raw('count(*) as total, status_perkawinan'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('status_perkawinan')
            ->get();

            
            //barchart relawan berdasarkan kecamatan
            $barChartRelawanKecamatan = DB::table('relawan')
            ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
            ->join('kecamatan', 'desa.kecamatan_id', '=', 'kecamatan.id')
            ->select(DB::raw('count(*) as total, kecamatan.nama as kecamatan_id'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('kecamatan_id')
            ->orderBy('total','desc')
            ->get();
            
            //barchart relawan berdasarkan desa
            $barChartRelawanDesa = DB::table('relawan')
            ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
            ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('id_wilayah')
            ->orderBy('total','desc')
            ->get();            

            //tabel most count DPT
            $mostDpt = DB::table('pendukung')
            ->join('relawan', 'pendukung.relawan_id', '=', 'relawan.id')
            ->join('users', 'relawan.users_id', '=', 'users.id')
            ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
            ->where('pendukung.kandidat_id', $idKandidat)
            ->select(DB::raw('count(*) as total , users.name as relawan_id, desa.nama as id_wilayah'))
            ->groupBy('pendukung.relawan_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();
            
            //DPT berdasarkan jenis kelamin
            //   $relawan = Relawan::where('id',Auth::user()->relawan->id)->with('relawans')->first();
            //   $jkDpt=[
            //     [
            //         'nama'=>'wanita',
            //         'total'=>0
            //     ],
            //     [
            //         'nama'=>'pria',
            //         'total'=>0
            //     ],
            //   ];

            //   $data=[];
            //   foreach($relawan->descendants as $relawan){
            //     foreach($relawan->dpts as $item){
            //         foreach($jkDpt as $jk){
            //             if($jk['nama'] === $item->jenis_kelamin){
            //                 $jk['total'] += 1;
            //             }
            //         }
            //     }
            //   };
            
            //pie chart dpt jenis kelamin
            $pieChartDptJenisKelamin = DB::table('pendukung')
            ->select(DB::raw('count(*) as total, jenis_kelamin'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('jenis_kelamin')
            ->get();

            // data relawan
            $scaterPlotUmurRelawanP = DB::table('relawan')
            ->where('kandidat_id', $idKandidat)
            ->where('jenis_kelamin','=','Perempuan')
            ->select('tanggal_lahir')
            ->get();
            
            $scaterPlotUmurRelawanL = DB::table('relawan')
            ->where('kandidat_id', $idKandidat)
            ->where('jenis_kelamin','=','Laki-laki')
            ->select('tanggal_lahir')
            ->get();

            //get umur dari tanggal lahir pakai carbon
            $umurRelawan=[];

            foreach($scaterPlotUmurRelawanP as $data){
                $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
                array_push($umurRelawan, $data);
            }

            //return $umurRelawan;

            $rangeUmurRelawan = [];
            $rangeUmurRelawan['<20'] = 0;
            $rangeUmurRelawan['21-30'] = 0;
            $rangeUmurRelawan['31-40'] = 0;
            $rangeUmurRelawan['41-50'] = 0;
            $rangeUmurRelawan['51-60'] = 0;
            $rangeUmurRelawan['61-70'] = 0;
            $rangeUmurRelawan['71-80'] = 0;
            $rangeUmurRelawan['>80'] = 0;

            foreach($umurRelawan as $data){

                if($data->tanggal_lahir < 21){
                    $rangeUmurRelawan['<20'] += 1;   
                }
                elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                    $rangeUmurRelawan['21-30'] += 1;
                }
                elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                    $rangeUmurRelawan['31-40'] += 1; 
                }
                elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                    $rangeUmurRelawan['41-50'] += 1; 
                }
                elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                    $rangeUmurRelawan['51-60'] += 1; 
                }
                elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                    $rangeUmurRelawan['61-70'] += 1; 
                }
                elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                    $rangeUmurRelawan['71-80'] += 1; 
                }
                else{
                    $rangeUmurRelawan['>80'] += 1; 
                    }
            };

            $ketUmurRelawanP = [
                [
                    'ket'   => "＜20",
                    'total' => $rangeUmurRelawan['<20']
                ],
                [
                    'ket' => "21-30",
                    'total' => $rangeUmurRelawan['21-30']
                ],
                [
                    'ket' => "31-40",
                    'total' => $rangeUmurRelawan['31-40']
                ],
                [
                    'ket' => "41-50",
                    'total' => $rangeUmurRelawan['41-50']
                ],
                [
                    'ket' => "51-60",
                    'total' => $rangeUmurRelawan['51-60']
                ],
                [
                    'ket' => "61-70",
                    'total' => $rangeUmurRelawan['61-70']
                ],
                [
                    'ket' => "71-80",
                    'total' => $rangeUmurRelawan['71-80']
                ],
                [
                    'ket' => "＞80",
                    'total' => $rangeUmurRelawan['>80']
                ],
            ];

             //get umur dari tanggal lahir pakai carbon
             $umurRelawanL=[];

             foreach($scaterPlotUmurRelawanL as $data){
                 $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
                 array_push($umurRelawanL, $data);
             }
 
             //return $umurRelawan;
 
             $rangeUmurRelawanL = [];
             $rangeUmurRelawanL['<20'] = 0;
             $rangeUmurRelawanL['21-30'] = 0;
             $rangeUmurRelawanL['31-40'] = 0;
             $rangeUmurRelawanL['41-50'] = 0;
             $rangeUmurRelawanL['51-60'] = 0;
             $rangeUmurRelawanL['61-70'] = 0;
             $rangeUmurRelawanL['71-80'] = 0;
             $rangeUmurRelawanL['>80'] = 0;
 
             foreach($umurRelawanL as $data){
 
                 if($data->tanggal_lahir < 21){
                     $rangeUmurRelawanL['<20'] += 1;   
                 }
                 elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                     $rangeUmurRelawanL['21-30'] += 1;
                 }
                 elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                     $rangeUmurRelawanL['31-40'] += 1; 
                 }
                 elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                     $rangeUmurRelawanL['41-50'] += 1; 
                 }
                 elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                     $rangeUmurRelawanL['51-60'] += 1; 
                 }
                 elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                     $rangeUmurRelawanL['61-70'] += 1; 
                 }
                 elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                     $rangeUmurRelawanL['71-80'] += 1; 
                 }
                 else{
                     $rangeUmurRelawanL['>80'] += 1; 
                     }
             };
 
             $ketUmurRelawanL = [
                 [
                     'ket'   => "＜20",
                     'total' => $rangeUmurRelawanL['<20']
                 ],
                 [
                     'ket' => "21-30",
                     'total' => $rangeUmurRelawanL['21-30']
                 ],
                 [
                     'ket' => "31-40",
                     'total' => $rangeUmurRelawanL['31-40']
                 ],
                 [
                     'ket' => "41-50",
                     'total' => $rangeUmurRelawanL['41-50']
                 ],
                 [
                     'ket' => "51-60",
                     'total' => $rangeUmurRelawanL['51-60']
                 ],
                 [
                     'ket' => "61-70",
                     'total' => $rangeUmurRelawanL['61-70']
                 ],
                 [
                     'ket' => "71-80",
                     'total' => $rangeUmurRelawanL['71-80']
                 ],
                 [
                     'ket' => "＞80",
                     'total' => $rangeUmurRelawanL['>80']
                 ],
             ];

            //get tanggal lahir pendukung Laki-laki
            $tanggalLahirDptL = DB::table('pendukung')
            ->select(DB::raw('tanggal_lahir'))
            ->where('kandidat_id',$idKandidat)
            ->where('jenis_kelamin','=','Laki-laki')
            ->get();

             //get umur dari tanggal lahir pakai carbon
             $umurDptL=[];

             foreach($tanggalLahirDptL as $data){
                 $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
                 array_push($umurDptL, $data);
             }

             $rangeUmurDptL = [];
             $rangeUmurDptL['<20'] = 0;
             $rangeUmurDptL['21-30'] = 0;
             $rangeUmurDptL['31-40'] = 0;
             $rangeUmurDptL['41-50'] = 0;
             $rangeUmurDptL['51-60'] = 0;
             $rangeUmurDptL['61-70'] = 0;
             $rangeUmurDptL['71-80'] = 0;
             $rangeUmurDptL['>80'] = 0;

             foreach($umurDptL as $data){

                if($data->tanggal_lahir < 21){
                    $rangeUmurDptL['<20'] += 1;   
                }
                elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                    $rangeUmurDptL['21-30'] += 1;
                }
                elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                    $rangeUmurDptL['31-40'] += 1; 
                }
                elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                    $rangeUmurDptL['41-50'] += 1; 
                }
                elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                    $rangeUmurDptL['51-60'] += 1; 
                }
                elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                    $rangeUmurDptL['61-70'] += 1; 
                }
                elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                    $rangeUmurDptL['71-80'] += 1; 
                }
                else{
                    $rangeUmurDptL['>80'] += 1; 
                    }
        };

        $ketUmurDptL = [
            [
                'ket'   => "＜20",
                'total' => $rangeUmurDptL['<20']
            ],
            [
                'ket' => "21-30",
                'total' => $rangeUmurDptL['21-30']
            ],
            [
                'ket' => "31-40",
                'total' => $rangeUmurDptL['31-40']
            ],
            [
                'ket' => "41-50",
                'total' => $rangeUmurDptL['41-50']
            ],
            [
                'ket' => "51-60",
                'total' => $rangeUmurDptL['51-60']
            ],
            [
                'ket' => "61-70",
                'total' => $rangeUmurDptL['61-70']
            ],
            [
                'ket' => "71-80",
                'total' => $rangeUmurDptL['71-80']
            ],
            [
                'ket' => "＞80",
                'total' => $rangeUmurDptL['>80']
            ],
        ];
        //get tanggal lahir pendukung Perempuan
        $tanggalLahirDptP = DB::table('pendukung')
        ->select(DB::raw('tanggal_lahir'))
        ->where('kandidat_id',$idKandidat)
        ->where('jenis_kelamin','=','Perempuan')
        ->get();

         //get umur dari tanggal lahir pakai carbon
         $umurDptP=[];

         foreach($tanggalLahirDptP as $data){
             $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
             array_push($umurDptP, $data);
         }

         $rangeUmurDptP = [];
         $rangeUmurDptP['<20'] = 0;
         $rangeUmurDptP['21-30'] = 0;
         $rangeUmurDptP['31-40'] = 0;
         $rangeUmurDptP['41-50'] = 0;
         $rangeUmurDptP['51-60'] = 0;
         $rangeUmurDptP['61-70'] = 0;
         $rangeUmurDptP['71-80'] = 0;
         $rangeUmurDptP['>80'] = 0;

         foreach($umurDptP as $data){

            if($data->tanggal_lahir < 21){
                $rangeUmurDptP['<20'] += 1;   
            }
            elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                $rangeUmurDptP['21-30'] += 1;
            }
            elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                $rangeUmurDptP['31-40'] += 1; 
            }
            elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                $rangeUmurDptP['41-50'] += 1; 
            }
            elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                $rangeUmurDptP['51-60'] += 1; 
            }
            elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                $rangeUmurDptP['61-70'] += 1; 
            }
            elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                $rangeUmurDptP['71-80'] += 1; 
            }
            else{
                $rangeUmurDptP['>80'] += 1; 
                }
    };

    $ketUmurDptP = [
        [
            'ket'   => "＜20",
            'total' => $rangeUmurDptP['<20']
        ],
        [
            'ket' => "21-30",
            'total' => $rangeUmurDptP['21-30']
        ],
        [
            'ket' => "31-40",
            'total' => $rangeUmurDptP['31-40']
        ],
        [
            'ket' => "41-50",
            'total' => $rangeUmurDptP['41-50']
        ],
        [
            'ket' => "51-60",
            'total' => $rangeUmurDptP['51-60']
        ],
        [
            'ket' => "61-70",
            'total' => $rangeUmurDptP['61-70']
        ],
        [
            'ket' => "71-80",
            'total' => $rangeUmurDptP['71-80']
        ],
        [
            'ket' => "＞80",
            'total' => $rangeUmurDptP['>80']
        ],
    ];
            //total relawan perempuan
            $totalRelawanPerempuan = DB::table('relawan')
            ->where('kandidat_id',$idKandidat)
            ->where('jenis_kelamin','=','Perempuan')
            ->count();

            //total relawan laki-laki
            $totalRelawanLakilaki = DB::table('relawan')
            ->where('kandidat_id',$idKandidat)
            ->where('jenis_kelamin','=','Laki-laki')
            ->count();

             //total pendukung perempuan
             $totalPendukungPerempuan = DB::table('pendukung')
             ->where('kandidat_id',$idKandidat)
             ->where('jenis_kelamin','=','Perempuan')
             ->count();

            //total pendukung laki-laki
            $totalPendukungLakilaki = DB::table('pendukung')
            ->where('kandidat_id',$idKandidat)
            ->where('jenis_kelamin','=','Laki-laki')
            ->count();

            //target dukungan
            $targetDukungan = Auth::user()->kandidat->target_pendukung;

            //percentage pemenangan
            $totalPendukungAll = DB::table('pendukung')
            ->where('kandidat_id',$idKandidat)
            ->count();
             
            $targetDukunganKandidat = Auth::user()->kandidat->target_pendukung;

            $winRate = $totalPendukungAll/$targetDukunganKandidat*100;

            //monitoring wilayah pendukung
            $monitoringWilayahPendukung = DB::table('pendukung')
            ->join('desa', 'pendukung.id_wilayah', '=', 'desa.id')
            ->where('pendukung.kandidat_id', $idKandidat)
            ->select(DB::raw('count(*) as total , desa.nama as id_wilayah'))
            ->groupBy('pendukung.id_wilayah')
            ->orderBy('id_wilayah','desc')
            ->get();

            //monitoring wilayah relawan
            $monitoringWilayahRelawan = DB::table('relawan')
            ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
            ->where('relawan.kandidat_id', $idKandidat)
            ->select(DB::raw('count(*) as total , desa.nama as id_wilayah'))
            ->groupBy('relawan.id_wilayah')
            ->orderBy('id_wilayah','desc')
            ->get();

            //sebaran wilayah relawan dengan informasi gender P
             $sebaranWilayahP = DB::table('relawan')
             ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
             ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
             ->where('kandidat_id',$idKandidat)
             ->where('jenis_kelamin', '=', 'Perempuan')
             ->groupBy('id_wilayah')
             ->orderBy('id_wilayah','desc')
             ->get();
            
             //sebaran wilayah relawan dengan informasi gender L
             $sebaranWilayahL = DB::table('relawan')
             ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
             ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
             ->where('kandidat_id',$idKandidat)
             ->where('jenis_kelamin', '=', 'Laki-laki')
             ->orderBy('id_wilayah','desc')
             ->get();

             //sebaran wilayah total 1
             $sebaranWilayahTotal = DB::table('relawan')
             ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
             ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
             ->where('kandidat_id',$idKandidat)
             ->groupBy('id_wilayah')
             ->orderBy('id_wilayah','desc')
             ->get();


            //Kinerja relawan perhari
            $tanggalPertama = Dpt::where('kandidat_id', Auth::user()->kandidat->id)
            ->orderBy('created_at', 'asc')
            ->first()
            ->created_at;
            //return $tanggalPertama;

            $jumlahHari = Carbon::now()->startOfDay()->diffInDays($tanggalPertama);

            // Pengecekan jika hari sama dengan nol
            $jumlahHari == 0 ? $jumlahHari = 1 : null;

            // Hitung rata-rata per hari ditambahkan
            $rataRataPerHari = ROUND($jumlah_dpt / $jumlahHari);

            //kinerja relawan perminggu
            $tanggalPertama = Dpt::where('kandidat_id', Auth::user()->kandidat->id)
            ->orderBy('created_at', 'asc')
            ->first()
            ->created_at;

            $jumlahMinggu = Carbon::now()->startOfWeek()->diffInWeeks($tanggalPertama);

            // Pengecekan jika minggu  sama dengan nol
            $jumlahMinggu == 0 ? $jumlahMinggu = 1 : null;

            // Hitung rata-rata per minggu ditambahkan
            $rataRataPerMinggu = ROUND($jumlah_dpt / $jumlahMinggu);

            //kinerja relawan perbulan
            $tanggalPertama = Dpt::where('kandidat_id', Auth::user()->kandidat->id)
            ->orderBy('created_at', 'asc')
            ->first()
            ->created_at;

            $jumlahBulan = Carbon::now()->startOfMonth()->diffInMonths($tanggalPertama);

            // Pengecekan jika jumlah bulan sama dengan nol
            $jumlahBulan == 0 ? $jumlahBulan = 1 : null;

            // Hitung rata-rata per bulan ditambahkan
            $rataRataPerBulan = $jumlah_dpt / $jumlahBulan;

            $selisihTargetPendukung = 100 - $winRate;

            //chart dukungan 30 hari
            $areaChart30 = DB::table('pendukung')
            ->select(DB::raw('DATE(created_at) as created_date, COUNT(*) as total'))
            ->where('kandidat_id', $idKandidat)
            ->where('created_at', '>', now()->subDays(30)->endOfDay())
            ->groupBy('created_date')
            ->orderBy('created_date')
            ->get();

            return view('dashboard.home', compact('jumlah_relawan', 'jumlah_dpt'
            ,'barChartDptSuku','pieChartDptAgama','time_series_dpt','barChartDptIdWilayah','mostDpt'
            ,'pieChartRelawanJenisKelamin','pieChartRelawanStatusPerkawinan','barChartRelawanKecamatan'
            ,'barChartRelawanDesa','dptNow','relawanNow','pieChartDptJenisKelamin', 'ketUmurRelawanP'
            , 'ketUmurDptP','totalRelawanPerempuan','totalRelawanLakilaki','totalPendukungPerempuan'
            ,'totalPendukungLakilaki','targetDukungan','winRate','monitoringWilayahRelawan'
            ,'monitoringWilayahPendukung','sebaranWilayahP','sebaranWilayahL','sebaranWilayahTotal'
            ,'ketUmurRelawanL','ketUmurDptL','rataRataPerHari','rataRataPerMinggu','rataRataPerBulan'
            ,'totalPendukungAll','selisihTargetPendukung','areaChart30'));
        }
        else{ 
                //dashboard milik relawan
                //ambil relawan_id
                $idRelawan = Auth::user()->relawan->id;

                //jumlah relawan
                $relawan = Relawan::where('id',Auth::user()->relawan->id)->with('relawans')->first();
                
                //get total relawan with kalnoy too
                $jumlah_relawan = $relawan->descendants()->pluck('id')->count();

                //tarik data DPT
                $relawanDpt = Relawan::where('users_id', Auth::user()->id)->first();

                $dpts=[];

                foreach($relawan->descendants as $key=> $item){
                    if(!$item->dpts->isEmpty()){
                        $dpts[] = $item->dpts;
                    }
                }
                
                $jumlah_dpt = count($dpts);

                //agama dpt
                $agamaDpt=[];
                foreach($relawan->descendants as $key=> $item){
                    if(!$item->dpts->isEmpty()){
                        $dpts[] = $item->dpts;
                        $data['total'] = 0;
                        foreach($item->dpts as $dpt){
                            $data['nama'] = $dpt->agama->nama;
                            $data['total'] +=1;
                            array_push($agamaDpt,$data);
                        }
                    }
                }
                //perbandingan jumlah dpt berdasarkan agama
                $pieChartDptA = DB::table('pendukung')
                ->select(DB::raw('count(*) as isichart, agama_id'))
                ->groupBy('agama_id')
                ->get();

                //barchart dpt berdasarkan suku
                // $sukuDpt=[];
                // foreach($relawan->descendants as $key=> $item){
                //     if(!$item->dpts->isEmpty()){
                //         $dpts[] = $item->dpts;
                //         $data['total'] = 0;
                //         foreach($item->dpts as $dpt){
                //             $data['nama'] = $dpt->suku->nama;
                //             $data['total'] +=1;
                //             array_push($sukuDpt,$data);
                //         }
                //     }
                // }
                // return $sukuDpt;

                //pie chart jenis kelamin relawan sendiri
                $relawan = Relawan::where('id',Auth::user()->relawan->id)->with('relawans')->first();
                //$relawan = Relawan::where('relawan_id',Auth::user()->relawan->id)->with('relawans')->first();

                //return $relawan;

                $totalJKRelawan = [];
                $totalJKRelawan['L'] = 0;
                $totalJKRelawan['P'] = 0;

            if(!$relawan->relawans->isEmpty()){
                foreach ($relawan->descendants as $key=> $item){

                    if($item->jenis_kelamin === 'L'){
                    $totalJKRelawan['L'] =+ 1;
                    }
                    else{
                        $totalJKRelawan['P'] =+ 1;
                    }
                };
            }
                $ketJKRelawan = [
                    [
                        'ket'   => "L",
                        'total' => $totalJKRelawan['L']
                    ],
                    [
                        'ket' => "P",
                        'total' => $totalJKRelawan['P']
                    ]
                ];

                //return $ketJKRelawan;

                $totalSPRelawan = [];
                $totalSPRelawan['S'] = 0;
                $totalSPRelawan['P'] = 0;
                $totalSPRelawan['B'] = 0;

                if(!$relawan->relawans->isEmpty()){
                    foreach ($relawan->descendants as $key=> $item){

                        if($item->status_perkawinan === 'S'){
                            $totalSPRelawan['S'] =+ 1;
                        }
                        elseif($item->status_perkawinan === 'P'){
                            $totalSPRelawan['P'] =+ 1;
                        }
                        else{
                            $totalSPRelawan['B'] =+ 1;
                        }
                    };
                }
                $ketSPRelawan = [
                    [
                        'ket'   => "S",
                        'total' => $totalSPRelawan['S']
                    ],
                    [
                        'ket' => "P",
                        'total' => $totalSPRelawan['P']
                    ],
                    [
                        'ket'   => "B",
                        'total' => $totalSPRelawan['S']
                    ]
                ];

                //pie chart Relawan berdasarkan jenis-kelaminnya
                $pieChartRelawanJenisKelamin = DB::table('relawan')
                ->select(DB::raw('count(*) as total, jenis_kelamin'))
                ->where('kandidat_id', Auth::user()->relawan->kandidat->id)
                //->where('relawan_id', Auth::user()->relawan->id)
                ->groupBy('jenis_kelamin')
                ->get();
                
                //pie chart Relawan berdasarkan status_perkawinan
                $pieChartRelawanStatusPerkawinan = DB::table('relawan')
                ->select(DB::raw('count(*) as total, status_perkawinan'))
                ->where('kandidat_id', Auth::user()->relawan->kandidat->id)
                //->where('relawan_id', Auth::user()->relawan->id)
                ->groupBy('status_perkawinan')
                ->get();

                //mengambil jumlah +dpt hari ini menggunakan carbon
                $dptNow = DB::table('pendukung')
                ->where('relawan_id', $idRelawan)
                ->whereDate('created_at', Carbon::today())
                ->count();

                //mengambil jumlah +relawan hari ini pakai carbon
                $relawanNow = DB::table('relawan')
                ->where('relawan_id', $idRelawan)
                ->whereDate('created_at', Carbon::today())
                ->count();

                //take count pendukung by relawan_id
                $jumlahPendukung = Dpt::where('relawan_id', $idRelawan)->count();

                //pendukung berdasarkan gender
                $pendukungGender = DB::table('pendukung')
                ->select(DB::raw('count(*) as total, jenis_kelamin'))
                ->where('relawan_id', $idRelawan)
                ->groupBy('jenis_kelamin')
                ->get();

                //get tanggal lahir pendukung Laki-laki
                $tanggalLahirDptL = DB::table('pendukung')
                ->select(DB::raw('tanggal_lahir'))
                ->where('relawan_id',$idRelawan)
                ->where('jenis_kelamin','=','Laki-laki')
                ->get();

                //get umur dari tanggal lahir pakai carbon
                $umurDptL=[];

                foreach($tanggalLahirDptL as $data){
                    $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
                    array_push($umurDptL, $data);
                }

                $rangeUmurDptL = [];
                $rangeUmurDptL['<20'] = 0;
                $rangeUmurDptL['21-30'] = 0;
                $rangeUmurDptL['31-40'] = 0;
                $rangeUmurDptL['41-50'] = 0;
                $rangeUmurDptL['51-60'] = 0;
                $rangeUmurDptL['61-70'] = 0;
                $rangeUmurDptL['71-80'] = 0;
                $rangeUmurDptL['>80'] = 0;

                foreach($umurDptL as $data){

                    if($data->tanggal_lahir < 21){
                        $rangeUmurDptL['<20'] += 1;   
                    }
                    elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                        $rangeUmurDptL['21-30'] += 1;
                    }
                    elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                        $rangeUmurDptL['31-40'] += 1; 
                    }
                    elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                        $rangeUmurDptL['41-50'] += 1; 
                    }
                    elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                        $rangeUmurDptL['51-60'] += 1; 
                    }
                    elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                        $rangeUmurDptL['61-70'] += 1; 
                    }
                    elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                        $rangeUmurDptL['71-80'] += 1; 
                    }
                    else{
                        $rangeUmurDptL['>80'] += 1; 
                        }
            };

            $ketUmurDptL = [
                [
                    'ket'   => "＜20",
                    'total' => $rangeUmurDptL['<20']
                ],
                [
                    'ket' => "21-30",
                    'total' => $rangeUmurDptL['21-30']
                ],
                [
                    'ket' => "31-40",
                    'total' => $rangeUmurDptL['31-40']
                ],
                [
                    'ket' => "41-50",
                    'total' => $rangeUmurDptL['41-50']
                ],
                [
                    'ket' => "51-60",
                    'total' => $rangeUmurDptL['51-60']
                ],
                [
                    'ket' => "61-70",
                    'total' => $rangeUmurDptL['61-70']
                ],
                [
                    'ket' => "71-80",
                    'total' => $rangeUmurDptL['71-80']
                ],
                [
                    'ket' => "＞80",
                    'total' => $rangeUmurDptL['>80']
                ],
            ];
            //get tanggal lahir pendukung Perempuan
            $tanggalLahirDptP = DB::table('pendukung')
            ->select(DB::raw('tanggal_lahir'))
            ->where('relawan_id',$idRelawan)
            ->where('jenis_kelamin','=','Perempuan')
            ->get();

            //get umur dari tanggal lahir pakai carbon
            $umurDptP=[];

            foreach($tanggalLahirDptP as $data){
                $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
                array_push($umurDptP, $data);
            }

            $rangeUmurDptP = [];
            $rangeUmurDptP['<20'] = 0;
            $rangeUmurDptP['21-30'] = 0;
            $rangeUmurDptP['31-40'] = 0;
            $rangeUmurDptP['41-50'] = 0;
            $rangeUmurDptP['51-60'] = 0;
            $rangeUmurDptP['61-70'] = 0;
            $rangeUmurDptP['71-80'] = 0;
            $rangeUmurDptP['>80'] = 0;

            foreach($umurDptP as $data){

                if($data->tanggal_lahir < 21){
                    $rangeUmurDptP['<20'] += 1;   
                }
                elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                    $rangeUmurDptP['21-30'] += 1;
                }
                elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                    $rangeUmurDptP['31-40'] += 1; 
                }
                elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                    $rangeUmurDptP['41-50'] += 1; 
                }
                elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                    $rangeUmurDptP['51-60'] += 1; 
                }
                elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                    $rangeUmurDptP['61-70'] += 1; 
                }
                elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                    $rangeUmurDptP['71-80'] += 1; 
                }
                else{
                    $rangeUmurDptP['>80'] += 1; 
                    }
            };

            $ketUmurDptP = [
                [
                    'ket'   => "＜20",
                    'total' => $rangeUmurDptP['<20']
                ],
                [
                    'ket' => "21-30",
                    'total' => $rangeUmurDptP['21-30']
                ],
                [
                    'ket' => "31-40",
                    'total' => $rangeUmurDptP['31-40']
                ],
                [
                    'ket' => "41-50",
                    'total' => $rangeUmurDptP['41-50']
                ],
                [
                    'ket' => "51-60",
                    'total' => $rangeUmurDptP['51-60']
                ],
                [
                    'ket' => "61-70",
                    'total' => $rangeUmurDptP['61-70']
                ],
                [
                    'ket' => "71-80",
                    'total' => $rangeUmurDptP['71-80']
                ],
                [
                    'ket' => "＞80",
                    'total' => $rangeUmurDptP['>80']
                ],
            ];

            $pendukungSuku = DB::table('pendukung')
            ->join('suku', 'pendukung.suku_id', '=', 'suku.id')
            ->select(DB::raw('count(*) as total, suku.nama as suku'))
            ->where('relawan_id', $idRelawan)
            ->groupBy('suku')
            ->orderBy('total', 'desc')
            ->take(10)
            ->get();

            $pendukungAgama = DB::table('pendukung')
            ->join('agama', 'pendukung.agama_id', '=', 'agama.id')
            ->select(DB::raw('count(*) as total, agama.nama as agama'))
            ->where('relawan_id', $idRelawan)
            ->orderBy('total', 'desc')
            ->groupBy('agama')
            ->get();

            //Line chart Pertumbuhan pendukung Berdasarkan bulan tahun
            $time_series_pendukung = DB::table('pendukung')
            ->select(DB::raw("concat(MONTH(created_at), '-',YEAR(created_at)) as monthyear"), 
            DB::raw('count(*) as jumlah'))
            ->where('relawan_id',$idRelawan)
            ->groupBy('monthyear')
            ->get();

            $areaChart30 = DB::table('pendukung')
            ->select(DB::raw('count(*) as total, DATE(created_at) as created_at'))
            ->where('relawan_id',$idRelawan)
            ->where('created_at', '>', now()->subDays(30)->endOfDay())
            ->groupBy('created_at')
            ->get();

            //return $areaChart30;

            return view('dashboard.home', compact('jumlah_relawan', 'jumlah_dpt','pieChartDptA'
            ,'agamaDpt','pieChartRelawanJenisKelamin','pieChartRelawanStatusPerkawinan','relawanNow'
            ,'dptNow','ketJKRelawan','ketSPRelawan','jumlahPendukung','pendukungGender','ketUmurDptL'
            ,'ketUmurDptP','pendukungSuku','pendukungAgama','time_series_pendukung','areaChart30'));
            }
       
    }
    public function createKandidat()
    {

        $jenis_kandidats = JenisKandidat::pluck('nama', 'id');

        return view('kandidats.createKandidat', compact('jenis_kandidats'));
    }
    public function createPerson()
    {

        $agamas = Agama::pluck('nama', 'id');
        $sukus = Suku::pluck('nama', 'id');

        return view('people.createCalon', compact('agamas', 'sukus'));
    }
    public function createWakilPerson()
    {

        $agamas = Agama::pluck('nama', 'id');
        $sukus = Suku::pluck('nama', 'id');

        return view('people.createWakil', compact('agamas', 'sukus'));
    }
    public function visualisasiKandidat(){

        if(Auth::user()->hasAnyRole(['relawan-free', 'relawan-premium'])){
            //ambil id kandidat
            $idKandidat = Auth::user()->relawan->kandidat_id;
            //ambil jumlah relawan berdasarkan kandidat_id
            $jumlah_relawan = Relawan::where('kandidat_id',$idKandidat)->count();
            
            $idRelawan = Auth::user()->relawan->id;
            //ambil jumlah dpt berdasarkan relawan_id
            //$jumlah_dpt = Dpt::where('relawan_id',$idRelawan)->count();
            $relawan = Relawan::where('id',Auth::user()->relawan->id)->with('relawans')->first();
            $relawanDpt = Relawan::where('users_id', Auth::user()->id)->first();
            $dpts=[];
            foreach($relawan->descendants as $key=> $item){
                if(!$item->dpts->isEmpty()){
                    $dpts[] = $item->dpts;
                }
            }

            $jumlah_dpt = Dpt::where('kandidat_id',$idKandidat)->count();

            //visualisasi dpt berdasarkan sukunya
            $barChartDptSuku = DB::table('pendukung')
            ->join('suku', 'pendukung.suku_id', '=', 'suku.id')
            ->select(DB::raw('count(*) as total, suku.nama as suku'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('suku.nama')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

            //visualisasi dpt berdasarkan agama dengan pie chart
            $pieChartDptAgama = DB::table('pendukung')
            ->join('agama', 'pendukung.agama_id', '=', 'agama.id')
            ->select(DB::raw('count(*) as total, agama.nama as agama_id'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('agama.nama')
            ->get();

            //Pertumbuhan DPT Berdasarkan bulan tahun
            $time_series_dpt = DB::table('pendukung')
            ->select(DB::raw("concat(MONTH(created_at), '-',YEAR(created_at)) as monthyear"), DB::raw('count(*) as jumlah'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('monthyear')
            ->get();

             //DPT berdasarkan jenis kelamin
             $relawan = Relawan::where('kandidat_id',Auth::user()->relawan->kandidat_id)->with('relawans')->first();
             $jkDpt=[
               [
                   'nama'=>'wanita',
                   'total'=>0
               ],
               [
                   'nama'=>'pria',
                   'total'=>0
               ],
             ];
            //  return $relawan;

             $data=[];
             foreach($relawan->descendants as $relawan){
               foreach($relawan->dpts as $item){
                   foreach($jkDpt as $jk){
                       if($jk['nama'] === $item->jenis_kelamin){
                           $jk['total'] += 1;
                       }
                   }
               }
             }

             //visualisasi dpt berdasarkan wilayah desa
            $barChartDptIdWilayah = DB::table('pendukung')
            ->join('desa', 'pendukung.id_wilayah', '=', 'desa.id')
            ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('id_wilayah')
            ->orderBy('total','desc')
            ->get();

            //ambil data dpt
            $mostDpt = DB::table('pendukung')
            //join ke relawan, dimana relawan_id dpt = relawan id
            // ->join('relawan', 'dpt.relawan_id', '=', 'relawan.id')
            //join ke tabel user dimana relawan user id = user id
            //->join('users', 'relawan.users_id', '=', 'users.id')
            ->where('kandidat_id', $idKandidat)
            ->select(DB::raw('count(*) as total , relawan_id'))
            //->select(DB::raw('count(*) as total , users.name as  relawan_id'))
            ->groupBy('relawan_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

            //pie chart Relawan berdasarkan jenis-kelaminnya
            $pieChartRelawanJenisKelamin = DB::table('relawan')
            ->select(DB::raw('count(*) as total, jenis_kelamin'))
            ->where('kandidat_id',$idKandidat)
            ->groupBy('jenis_kelamin')
            ->get();
            
             //pie chart Relawan berdasarkan status_perkawinan
             $pieChartRelawanStatusPerkawinan = DB::table('relawan')
             ->select(DB::raw('count(*) as total, status_perkawinan'))
             ->where('kandidat_id',$idKandidat)
             ->groupBy('status_perkawinan')
             ->get();
            
              //barchart relawan berdasarkan kecamatan
              $barChartRelawanKecamatan = DB::table('relawan')
              ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
              ->join('kecamatan', 'desa.kecamatan_id', '=', 'kecamatan.id')
              ->select(DB::raw('count(*) as total, kecamatan.nama as kecamatan_id'))
              ->where('kandidat_id',$idKandidat)
              ->groupBy('kecamatan_id')
              ->orderBy('total','desc')
              ->get();
             
             //barchart relawan berdasarkan desa
              $barChartRelawanDesa = DB::table('relawan')
              ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
              ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
              ->where('kandidat_id',$idKandidat)
              ->groupBy('id_wilayah')
              ->orderBy('total','desc')
              ->get();    

             //mengambil jumlah +dpt hari ini menggunakan carbon
            $dptNow = Dpt::whereDate('created_at', Carbon::today())->count();

            //mengambil jumlah +relawan hari ini pakai carbon
            $relawanNow = DB::table('relawan')
            ->where('kandidat_id',$idKandidat)
            ->whereDate('created_at', Carbon::today())
            ->count();

             //pie chart dpt jenis kelamin
             $pieChartDptJenisKelamin = DB::table('pendukung')
             ->select(DB::raw('count(*) as total, jenis_kelamin'))
             ->where('kandidat_id',$idKandidat)
             ->groupBy('jenis_kelamin')
             ->get();

            // data relawan
            $scaterPlotUmurRelawanP = DB::table('relawan')
            ->where('kandidat_id', $idKandidat)
            ->where('jenis_kelamin','=','Perempuan')
            ->select('tanggal_lahir')
            ->get();
            
            $scaterPlotUmurRelawanL = DB::table('relawan')
            ->where('kandidat_id', $idKandidat)
            ->where('jenis_kelamin','=','Laki-laki')
            ->select('tanggal_lahir')
            ->get();

            //get umur dari tanggal lahir pakai carbon
            $umurRelawan=[];

            foreach($scaterPlotUmurRelawanP as $data){
                $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
                array_push($umurRelawan, $data);
            }

            //return $umurRelawan;

            $rangeUmurRelawan = [];
            $rangeUmurRelawan['<20'] = 0;
            $rangeUmurRelawan['21-30'] = 0;
            $rangeUmurRelawan['31-40'] = 0;
            $rangeUmurRelawan['41-50'] = 0;
            $rangeUmurRelawan['51-60'] = 0;
            $rangeUmurRelawan['61-70'] = 0;
            $rangeUmurRelawan['71-80'] = 0;
            $rangeUmurRelawan['>80'] = 0;

            foreach($umurRelawan as $data){

                if($data->tanggal_lahir < 21){
                    $rangeUmurRelawan['<20'] += 1;   
                }
                elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                    $rangeUmurRelawan['21-30'] += 1;
                }
                elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                    $rangeUmurRelawan['31-40'] += 1; 
                }
                elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                    $rangeUmurRelawan['41-50'] += 1; 
                }
                elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                    $rangeUmurRelawan['51-60'] += 1; 
                }
                elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                    $rangeUmurRelawan['61-70'] += 1; 
                }
                elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                    $rangeUmurRelawan['71-80'] += 1; 
                }
                else{
                    $rangeUmurRelawan['>80'] += 1; 
                    }
            };

            $ketUmurRelawanP = [
                [
                    'ket'   => "＜20",
                    'total' => $rangeUmurRelawan['<20']
                ],
                [
                    'ket' => "21-30",
                    'total' => $rangeUmurRelawan['21-30']
                ],
                [
                    'ket' => "31-40",
                    'total' => $rangeUmurRelawan['31-40']
                ],
                [
                    'ket' => "41-50",
                    'total' => $rangeUmurRelawan['41-50']
                ],
                [
                    'ket' => "51-60",
                    'total' => $rangeUmurRelawan['51-60']
                ],
                [
                    'ket' => "61-70",
                    'total' => $rangeUmurRelawan['61-70']
                ],
                [
                    'ket' => "71-80",
                    'total' => $rangeUmurRelawan['71-80']
                ],
                [
                    'ket' => "＞80",
                    'total' => $rangeUmurRelawan['>80']
                ],
            ];

             //get umur dari tanggal lahir pakai carbon
             $umurRelawanL=[];

             foreach($scaterPlotUmurRelawanL as $data){
                 $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
                 array_push($umurRelawanL, $data);
             }
 
             //return $umurRelawan;
 
             $rangeUmurRelawanL = [];
             $rangeUmurRelawanL['<20'] = 0;
             $rangeUmurRelawanL['21-30'] = 0;
             $rangeUmurRelawanL['31-40'] = 0;
             $rangeUmurRelawanL['41-50'] = 0;
             $rangeUmurRelawanL['51-60'] = 0;
             $rangeUmurRelawanL['61-70'] = 0;
             $rangeUmurRelawanL['71-80'] = 0;
             $rangeUmurRelawanL['>80'] = 0;
 
             foreach($umurRelawanL as $data){
 
                 if($data->tanggal_lahir < 21){
                     $rangeUmurRelawanL['<20'] += 1;   
                 }
                 elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                     $rangeUmurRelawanL['21-30'] += 1;
                 }
                 elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                     $rangeUmurRelawanL['31-40'] += 1; 
                 }
                 elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                     $rangeUmurRelawanL['41-50'] += 1; 
                 }
                 elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                     $rangeUmurRelawanL['51-60'] += 1; 
                 }
                 elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                     $rangeUmurRelawanL['61-70'] += 1; 
                 }
                 elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                     $rangeUmurRelawanL['71-80'] += 1; 
                 }
                 else{
                     $rangeUmurRelawanL['>80'] += 1; 
                     }
             };
 
             $ketUmurRelawanL = [
                 [
                     'ket'   => "＜20",
                     'total' => $rangeUmurRelawanL['<20']
                 ],
                 [
                     'ket' => "21-30",
                     'total' => $rangeUmurRelawanL['21-30']
                 ],
                 [
                     'ket' => "31-40",
                     'total' => $rangeUmurRelawanL['31-40']
                 ],
                 [
                     'ket' => "41-50",
                     'total' => $rangeUmurRelawanL['41-50']
                 ],
                 [
                     'ket' => "51-60",
                     'total' => $rangeUmurRelawanL['51-60']
                 ],
                 [
                     'ket' => "61-70",
                     'total' => $rangeUmurRelawanL['61-70']
                 ],
                 [
                     'ket' => "71-80",
                     'total' => $rangeUmurRelawanL['71-80']
                 ],
                 [
                     'ket' => "＞80",
                     'total' => $rangeUmurRelawanL['>80']
                 ],
             ];

            //get tanggal lahir pendukung Laki-laki
            $tanggalLahirDptL = DB::table('pendukung')
            ->select(DB::raw('tanggal_lahir'))
            ->where('kandidat_id',$idKandidat)
            ->where('jenis_kelamin','=','Laki-laki')
            ->get();

             //get umur dari tanggal lahir pakai carbon
             $umurDptL=[];

             foreach($tanggalLahirDptL as $data){
                 $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
                 array_push($umurDptL, $data);
             }

             $rangeUmurDptL = [];
             $rangeUmurDptL['<20'] = 0;
             $rangeUmurDptL['21-30'] = 0;
             $rangeUmurDptL['31-40'] = 0;
             $rangeUmurDptL['41-50'] = 0;
             $rangeUmurDptL['51-60'] = 0;
             $rangeUmurDptL['61-70'] = 0;
             $rangeUmurDptL['71-80'] = 0;
             $rangeUmurDptL['>80'] = 0;

             foreach($umurDptL as $data){

                if($data->tanggal_lahir < 21){
                    $rangeUmurDptL['<20'] += 1;   
                }
                elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                    $rangeUmurDptL['21-30'] += 1;
                }
                elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                    $rangeUmurDptL['31-40'] += 1; 
                }
                elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                    $rangeUmurDptL['41-50'] += 1; 
                }
                elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                    $rangeUmurDptL['51-60'] += 1; 
                }
                elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                    $rangeUmurDptL['61-70'] += 1; 
                }
                elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                    $rangeUmurDptL['71-80'] += 1; 
                }
                else{
                    $rangeUmurDptL['>80'] += 1; 
                    }
        };

        $ketUmurDptL = [
            [
                'ket'   => "＜20",
                'total' => $rangeUmurDptL['<20']
            ],
            [
                'ket' => "21-30",
                'total' => $rangeUmurDptL['21-30']
            ],
            [
                'ket' => "31-40",
                'total' => $rangeUmurDptL['31-40']
            ],
            [
                'ket' => "41-50",
                'total' => $rangeUmurDptL['41-50']
            ],
            [
                'ket' => "51-60",
                'total' => $rangeUmurDptL['51-60']
            ],
            [
                'ket' => "61-70",
                'total' => $rangeUmurDptL['61-70']
            ],
            [
                'ket' => "71-80",
                'total' => $rangeUmurDptL['71-80']
            ],
            [
                'ket' => "＞80",
                'total' => $rangeUmurDptL['>80']
            ],
        ];
        //get tanggal lahir pendukung Perempuan
        $tanggalLahirDptP = DB::table('pendukung')
        ->select(DB::raw('tanggal_lahir'))
        ->where('kandidat_id',$idKandidat)
        ->where('jenis_kelamin','=','Laki-laki')
        ->get();

         //get umur dari tanggal lahir pakai carbon
         $umurDptP=[];

         foreach($tanggalLahirDptP as $data){
             $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->age;
             array_push($umurDptP, $data);
         }

         $rangeUmurDptP = [];
         $rangeUmurDptP['<20'] = 0;
         $rangeUmurDptP['21-30'] = 0;
         $rangeUmurDptP['31-40'] = 0;
         $rangeUmurDptP['41-50'] = 0;
         $rangeUmurDptP['51-60'] = 0;
         $rangeUmurDptP['61-70'] = 0;
         $rangeUmurDptP['71-80'] = 0;
         $rangeUmurDptP['>80'] = 0;

         foreach($umurDptP as $data){

            if($data->tanggal_lahir < 21){
                $rangeUmurDptP['<20'] += 1;   
            }
            elseif(($data->tanggal_lahir >=21) && ($data->tanggal_lahir <=30)){
                $rangeUmurDptP['21-30'] += 1;
            }
            elseif(($data->tanggal_lahir >=31) && ($data->tanggal_lahir <=40)){
                $rangeUmurDptP['31-40'] += 1; 
            }
            elseif(($data->tanggal_lahir >=41) && ($data->tanggal_lahir <=50)){
                $rangeUmurDptP['41-50'] += 1; 
            }
            elseif(($data->tanggal_lahir >=51) && ($data->tanggal_lahir <=60)){
                $rangeUmurDptP['51-60'] += 1; 
            }
            elseif(($data->tanggal_lahir >=61) && ($data->tanggal_lahir <=70)){
                $rangeUmurDptP['61-70'] += 1; 
            }
            elseif(($data->tanggal_lahir >=71) && ($data->tanggal_lahir <=80)){
                $rangeUmurDptP['71-80'] += 1; 
            }
            else{
                $rangeUmurDptP['>80'] += 1; 
                }
    };

    $ketUmurDptP = [
        [
            'ket'   => "＜20",
            'total' => $rangeUmurDptP['<20']
        ],
        [
            'ket' => "21-30",
            'total' => $rangeUmurDptP['21-30']
        ],
        [
            'ket' => "31-40",
            'total' => $rangeUmurDptP['31-40']
        ],
        [
            'ket' => "41-50",
            'total' => $rangeUmurDptP['41-50']
        ],
        [
            'ket' => "51-60",
            'total' => $rangeUmurDptP['51-60']
        ],
        [
            'ket' => "61-70",
            'total' => $rangeUmurDptP['61-70']
        ],
        [
            'ket' => "71-80",
            'total' => $rangeUmurDptP['71-80']
        ],
        [
            'ket' => "＞80",
            'total' => $rangeUmurDptP['>80']
        ],
    ];
            //total relawan perempuan
            $totalRelawanPerempuan = DB::table('relawan')
            ->where('kandidat_id',$idKandidat)
            ->where('jenis_kelamin','=','Perempuan')
            ->count();

            //total relawan laki-laki
            $totalRelawanLakilaki = DB::table('relawan')
            ->where('kandidat_id',$idKandidat)
            ->where('jenis_kelamin','=','Laki-laki')
            ->count();

             //total pendukung perempuan
             $totalPendukungPerempuan = DB::table('pendukung')
             ->where('kandidat_id',$idKandidat)
             ->where('jenis_kelamin','=','Perempuan')
             ->count();

            //total pendukung laki-laki
            $totalPendukungLakilaki = DB::table('pendukung')
            ->where('kandidat_id',$idKandidat)
            ->where('jenis_kelamin','=','Laki-laki')
            ->count();

            //target dukungan
            $targetDukungan = Auth::user()->relawan->kandidat->target_pendukung;

            //percentage pemenangan
            $totalPendukungAll = DB::table('pendukung')
            ->where('kandidat_id',$idKandidat)
            ->count();
             
            //$targetDukunganKandidat = Auth::user()->kandidat->target_pendukung;

            $winRate = $totalPendukungAll/$targetDukungan*100;

            //monitoring wilayah pendukung
            $monitoringWilayahPendukung = DB::table('pendukung')
            ->join('desa', 'pendukung.id_wilayah', '=', 'desa.id')
            ->where('pendukung.kandidat_id', $idKandidat)
            ->select(DB::raw('count(*) as total , desa.nama as id_wilayah'))
            ->groupBy('pendukung.id_wilayah')
            ->orderBy('id_wilayah','desc')
            ->get();

            //monitoring wilayah relawan
            $monitoringWilayahRelawan = DB::table('relawan')
            ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
            ->where('relawan.kandidat_id', $idKandidat)
            ->select(DB::raw('count(*) as total , desa.nama as id_wilayah'))
            ->groupBy('relawan.id_wilayah')
            ->orderBy('id_wilayah','desc')
            ->get();

            //sebaran wilayah relawan dengan informasi gender P
             $sebaranWilayahP = DB::table('relawan')
             ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
             ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
             ->where('kandidat_id',$idKandidat)
             ->where('jenis_kelamin', '=', 'Perempuan')
             ->groupBy('id_wilayah')
             ->orderBy('id_wilayah','desc')
             ->get();
            
             //sebaran wilayah relawan dengan informasi gender L
             $sebaranWilayahL = DB::table('relawan')
             ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
             ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
             ->where('kandidat_id',$idKandidat)
             ->where('jenis_kelamin', '=', 'Laki-laki')
             ->groupBy('id_wilayah')
             ->orderBy('id_wilayah','desc')
             ->get();
             
             //sebaran wilayah total 1
             $sebaranWilayahTotal = DB::table('relawan')
             ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
             ->select(DB::raw('count(*) as total, desa.nama as id_wilayah'))
             ->where('kandidat_id',$idKandidat)
             ->groupBy('id_wilayah')
             ->orderBy('id_wilayah','desc')
             ->get();

             //Kinerja relawan perhari
            $tanggalPertama = Dpt::where('kandidat_id', $idKandidat)
            ->select('created_at')
            ->orderBy('created_at', 'asc')
            ->first();
            
            $jumlahHari = Carbon::now()->startOfDay()->diffInDays($tanggalPertama['created_at']);

            // Pengecekan jika hari sama dengan nol
            $jumlahHari == 0 ? $jumlahHari = 1 : null;

            // Hitung rata-rata per hari ditambahkan
            $rataRataPerHari = ROUND($jumlah_dpt / $jumlahHari);

            //kinerja relawan perminggu
            $tanggalPertama = Dpt::where('kandidat_id', $idKandidat)
            ->select('created_at')
            ->orderBy('created_at', 'asc')
            ->first();
        
            $jumlahMinggu = Carbon::now()->startOfWeek()->diffInWeeks($tanggalPertama['created_at']);

            // Pengecekan jika minggu  sama dengan nol
            $jumlahMinggu == 0 ? $jumlahMinggu = 1 : null;

            // Hitung rata-rata per minggu ditambahkan
            $rataRataPerMinggu = ROUND($jumlah_dpt / $jumlahMinggu);

            //kinerja relawan perbulan
            $tanggalPertama = Dpt::where('kandidat_id', $idKandidat)
            ->select('created_at')
            ->orderBy('created_at', 'asc')
            ->first();

            $jumlahBulan = Carbon::now()->startOfMonth()->diffInMonths($tanggalPertama['created_at']);

            // Pengecekan jika jumlah bulan sama dengan nol
            $jumlahBulan == 0 ? $jumlahBulan = 1 : null;

            // Hitung rata-rata per bulan ditambahkan
            $rataRataPerBulan = $jumlah_dpt / $jumlahBulan;

            $selisihTargetPendukung = 100 - $winRate;

             //chart dukungan 30 hari
            //  $areaChart30 = DB::table('pendukung')
            //  ->select(DB::raw('count(*) as total, DATE(created_at) as created_at'))
            //  ->where('kandidat_id',$idKandidat)
            //  ->where('created_at', '>', now()->subDays(30)->endOfDay())
            //  ->groupBy('created_at')
            //  ->get();

            $areaChart30 = DB::table('pendukung')
            ->select(DB::raw('DATE(created_at) as created_date, COUNT(*) as total'))
            ->where('kandidat_id', $idKandidat)
            ->where('created_at', '>', now()->subDays(30)->endOfDay())
            ->groupBy('created_date')
            ->orderBy('created_date')
            ->get();

            //return $areaChart30;
        
            return view('dashboard.visualisasi-relawan2', compact('jumlah_relawan', 'jumlah_dpt'
            ,'barChartDptSuku','pieChartDptAgama','time_series_dpt','barChartDptIdWilayah','mostDpt'
            ,'pieChartRelawanJenisKelamin','pieChartRelawanStatusPerkawinan','barChartRelawanKecamatan'
            ,'barChartRelawanDesa','dptNow','relawanNow','pieChartDptJenisKelamin', 'ketUmurRelawanP'
            , 'ketUmurDptP','totalRelawanPerempuan','totalRelawanLakilaki','totalPendukungPerempuan'
            ,'totalPendukungLakilaki','targetDukungan','winRate','monitoringWilayahRelawan'
            ,'monitoringWilayahPendukung','sebaranWilayahP','sebaranWilayahL','sebaranWilayahTotal'
            ,'ketUmurRelawanL','ketUmurDptL','rataRataPerMinggu','rataRataPerHari','rataRataPerBulan'
            ,'totalPendukungAll','selisihTargetPendukung','areaChart30'));
        }
    }
}
