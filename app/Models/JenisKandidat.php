<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKandidat extends Model
{
    public $table = 'jenis_kandidat';

    public $fillable = [
        'nama',
        'tingkat',
        'lembaga'
    ];

    protected $casts = [
        'nama' => 'string',
        'tingkat' => 'string',
        'lembaga' => 'string'
    ];

    public static $rules = [
        'nama' => 'nullable|string',
        'tingkat' => 'nullable|string',
        'lembaga' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function kandidats(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Kandidat::class, 'jenis_kandidat_id');
    }
}
