<?php
// ini adalah data master DPT dari KPU
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
        'nik'
    ];

    protected $casts = [
        'nik' => 'string'
    ];

    public static $rules = [
        'nik' => 'required|string'
    ];
}
