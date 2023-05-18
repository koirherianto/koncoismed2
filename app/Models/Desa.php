<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    public $table = 'desa';

    public $fillable = [
        'nama',
        'jenis',
        'latitude',
        'longitude',
        'sumber',
        'new',
        'kecamatan_id'
    ];

    protected $casts = [
        'nama' => 'string',
        'jenis' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
        'sumber' => 'string'
    ];

    public static $rules = [
        'nama' => 'nullable|string|max:255',
        'jenis' => 'nullable|string|max:50',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'sumber' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'new' => 'nullable',
        'kecamatan_id' => 'required'
    ];

    public function kecamatan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kecamatan::class, 'kecamatan_id');
    }
}
