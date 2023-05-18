<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suku extends Model
{
    public $table = 'suku';

    public $fillable = [
        'nama'
    ];

    protected $casts = [
        'nama' => 'string'
    ];

    public static $rules = [
        'nama' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function people(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Person::class, 'suku_id');
    }

    public function dpt(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Dpt::class, 'suku');
    }
}
