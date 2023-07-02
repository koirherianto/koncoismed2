<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public $table = 'kecamatan';

    public $fillable = [
        'nama',
        'latitude',
        'longitude',
        'sumber',
        'kabkota_id'
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
        'kabkota_id' => 'required'
    ];

    public function kabkota(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kabkota::class, 'kabkota_id');
    }

    public function desas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Desa::class, 'kecamatan_id');
    }

    public function relawanskec(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Relawan::class, 'id');
    }
}
