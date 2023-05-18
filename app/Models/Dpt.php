<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NestedSet;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Model\Suku;

class Dpt extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    
    public $table = 'dpt';

    public $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'kontak',
        'jenis_kelamin',
        'agama_id',
        'suku_id',//aku tambahin ini
        'suku',
        'tps',
        'rt',
        'rw',
        'alamat',
        'keterangan',
        'relawan_id',
        'id_wilayah',
        'kandidat_id'
    ];

    protected $casts = [
        'nama' => 'string',
        'nik' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'email' => 'string',
        'kontak' => 'string',
        'jenis_kelamin' => 'string',
        'suku_id' => 'string',
        'alamat' => 'string',
        'keterangan' => 'string',
        'kandidat_id' => 'string'
    ];

    public static $rules = [
        'nama' => 'required|string',
        'nik' => 'required|string',
        'tempat_lahir' => 'nullable|string',
        'tanggal_lahir' => 'nullable',
        'email' => 'nullable|string',
        'kontak' => 'nullable|string',
        'jenis_kelamin' => 'required|string',
        'agama_id' => 'required',
        'suku_id' => 'required|string',
        'tps' => 'nullable',
        'rt' => 'nullable',
        'rw' => 'nullable',
        'alamat' => 'nullable|string',
        'keterangan' => 'nullable|string',
        'relawan_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'id_wilayah' => 'required',
        'kandidat_id' => 'required'
    ];

    public function agama(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Agama::class, 'agama_id');
    }
    public function sukus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Suku::class, 'suku_id'); //sukunya kugani suku_id
        //suku nya ada
    }

    public function relawan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Relawan::class, 'relawan_id');
    }

    public function wilayah(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Wilayah::class, 'wilayah_id');
    }

    public function suku(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Suku::class, 'suku_id');
    }

    public function desa(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Desa::class, 'id_wilayah');
    }

}
