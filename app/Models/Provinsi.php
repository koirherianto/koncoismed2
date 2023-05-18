<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    public $table = 'provinsi';

    public $fillable = [
        'provinsi',
        'latitude',
        'longitude',
        'id_wilayah',
        'sumber'
    ];

    protected $casts = [
        'provinsi' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
        'sumber' => 'string'
    ];

    public static $rules = [
        'provinsi' => 'required|string|max:200',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'id_wilayah' => 'nullable',
        'sumber' => 'nullable|string|max:200',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function kabkota(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Kabkotum::class, 'provinsi_id');
    }
}
