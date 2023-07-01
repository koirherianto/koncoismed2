<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DptMaster extends Model
{
    public $table = 'dpt';

    public $fillable = [
        'nik',
        'nama',
        'tps',
        'id_wilayah'
    ];

    protected $casts = [
        'nik' => 'string',
        'nama' => 'string',
        'tps' => 'string'
    ];

    public static $rules = [
        'nik' => 'required|string|max:45',
        'nama' => 'required|string|max:225',
        'tps' => 'required|string|max:45',
        'id_wilayah' => 'required',
        'created_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static function countDptMaster()
    {
        return self::count();
    }

    public static function cariNik($nik) : bool
    {
        $dpt = self::where('nik', $nik)->first();

        return $dpt ? true : false;
    }
}
