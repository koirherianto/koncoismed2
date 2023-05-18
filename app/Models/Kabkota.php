<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
    public $table = 'kabkota';

    public $fillable = [
        'nama',
        'latitude',
        'longitude',
        'sumber',
        'provinsi_id'
    ];

    protected $casts = [
        'nama' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
        'sumber' => 'string'
    ];

    public static $rules = [
        'nama' => 'nullable|string|max:255',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'sumber' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'provinsi_id' => 'required'
    ];

    public function provinsi(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Provinsi::class, 'provinsi_id');
    }

    public function kecamatans(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Kecamatan::class, 'kabkota_id');
    }
}
