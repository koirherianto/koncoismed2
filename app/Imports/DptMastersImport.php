<?php
namespace App\Imports;
use DB;
use Auth;
use Flash;
use App\Models\DptMaster;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Imports\DptMastersImport;
use Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DptMastersImport implements ToCollection
{

    public function collection(Collection $rows)
{
        foreach ($rows as $row) 
            {
                $dpt = DptMaster::create([
                    'nama' => $row[0],
                    'nik'  => $row[1],
                    'tps'   => $row[2]
                ]);
            }
        return redirect(route('dpt-masters.index'));
}
}