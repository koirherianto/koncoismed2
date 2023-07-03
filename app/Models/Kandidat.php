<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kandidat extends Model
{
    public $table = 'kandidat';
    use SoftDeletes;

    public $fillable = [
        'nomor_urut',
        'users_id',
        'jenis_kandidat_id',
        'id_wilayah',
        'target_pendukung',
        'jumlah_tps',
        'alokasi_kursi'
    ];

    protected $casts = [
        
    ];

    protected $with = ['users'];

    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'nomor_urut' => 'nullable',
        'users_id' => 'required',
        'jenis_kandidat_id' => 'required',
        'id_wilayah' => 'nullable',
        'target_pendukung' => 'required'
    ];

    public function jenisKandidat(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\JenisKandidat::class, 'jenis_kandidat_id');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    public function kandidatHasPartais(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\KandidatHasPartai::class, 'kandidat_id');
    }

    public function persons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Person::class, 'kandidat_id');
    }

    public function relawans(): \Illuminate\Database\Eloquent\Relations\HasMany
    {//
        return $this->hasMany(\App\Models\Relawan::class, 'kandidat_id');
        
    }

    public function provinsis(): \Illuminate\Database\Eloquent\Relations\HasMany
    {//
        return $this->hasMany(\App\Models\Provinsi::class, 'id');
        
    }

    // public function kabkotas(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {//
    //     return $this->hasMany(\App\Models\Kabkota::class, 'id');
        
    // }
}