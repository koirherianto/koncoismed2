<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $table = 'person';

    public $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'kontak',
        'jenis_kelamin',
        'alamat',
        'agama_id',
        'suku_id',
        'jabatan',
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
        'alamat' => 'string',
        'jabatan' => 'string'
    ];

    public static $rules = [
        'nama' => 'nullable|string',
        'nik' => 'nullable|string',
        'tempat_lahir' => 'nullable|string',
        'tanggal_lahir' => 'nullable',
        'email' => 'nullable|string',
        'kontak' => 'nullable|string',
        'jenis_kelamin' => 'nullable|string',
        'alamat' => 'nullable|string',
        'agama_id' => 'required',
        'suku_id' => 'required',
        'jabatan' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'kandidat_id' => 'required'
    ];

    public function agama(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Agama::class, 'agama_id');
    }

    public function kandidat(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kandidat::class, 'kandidat_id');
    }

    public function suku(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Suku::class, 'suku_id');
    }
}
