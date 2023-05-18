<?php
namespace App\Imports;
use DB;
use Auth;
use Flash;
use App\Models\User;
use App\Models\Relawan;
use App\Models\Kandidat;
use App\Models\Desa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Imports\RelawansImport;
use Excel;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RelawansImport implements ToCollection
{

    public function collection(Collection $rows)
{
        foreach ($rows as $row) 
            {
                $user = User::create([
                    'name' => $row[1],
                    'contact'  => $row[2],
                    //'email'    => $row[2],
                    'password' => Hash::make($row[11]),
                    'alamat'   => $row[7],
                ]);

                if (Auth::user()->hasRole(['admin-kandidat-free','relawan-free'])) {
                    $user->assignRole('relawan-free');
                }
        
                    if (Auth::user()->hasRole(['admin-kandidat-premium','relawan-premium'])) {
                    $user->assignRole('relawan-premium');
                    }

                //mengambil id kecamatan
                $idKecamatan = DB::table('kecamatan')
                ->select('id')
                ->where('nama',$row[8])
                ->first();

                //mencari dan mengambil id kelurahan atau desa
                $idDesa = DB::table('desa')
                ->select('id')
                ->where('nama','LIKE','%'.$row[9].'%')
                //->whereIn('kecamatan_id', $idKecamatan)
                ->where('kecamatan_id', $idKecamatan->id)
                ->first();
                
                // DD($idDesa)

                if($row[5] == 'P'){
                    $row[5]  = 'Pernah';
                }elseif($row[5] == 'S'){
                    $row[5]  = 'Sudah';
                }else{
                    $row[5]  = 'Belum';
                }

                if($row[3] == 'P'){
                    $row[3]  = 'Perempuan';
                }else{
                    $row[3]  = 'Laki-laki';
                }

                $relawan = Relawan::create([
                    'users_id'    => $user->id,
                    'kandidat_id' => Auth::user()->relawan->kandidat_id,
                    'relawan_id'  => Auth::user()->relawan->id,
                    'id_wilayah'  => $idDesa->id,
                    'status' => $row[10],
                    'nik' => $row[2],
                    'no_kta' => $row[0],
                    'jenis_kelamin' => $row[3],
                    'tempat_lahir' => $row[4],
                    'tanggal_lahir' => Carbon::parse($row[6])->format('Y-m-d'),
                    'status_perkawinan' => $row[5],
                    //
                ]);

            }
            return redirect(route('relawans.index'));
}
}