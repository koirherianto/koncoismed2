<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kalnoy\Nestedset\NodeTrait;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Auth;


class Relawan extends Model implements FromCollection, HasMedia, WithHeadings, WithMapping
{
    use NodeTrait, HasFactory, InteractsWithMedia;
    public $table = 'relawan';

    public function getLftName()
    {
        return 'left';
    }

    public function getRgtName()
    {
        return 'right';
    }

    public function getParentIdName()
    {
        return 'relawan_id';
    }

    // Specify parent id attribute mutator
    public function setRelawanIdAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }
    
    public $fillable = [
        'users_id',
        'relawan_id',
        'kandidat_id',
        'id_wilayah',
        'status',
        'left',
        'right',
        'no_kta',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan'
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'users_id' => 'required',
        'relawan_id' => 'nullable',
        'kandidat_id' => 'nullable',
        'status' => 'nullable',
        'id_wilayah' => 'nullable',
        'left' => 'nullable',
        'right' => 'nullable',
        'no_kta'=> 'nullable',
        'nik'=> 'nullable',
        'jenis_kelamin'=> 'nullable',
        'tempat_lahir'=> 'nullable',
        'tanggal_lahir'=> 'nullable',
        'status_perkawinan' => 'nullable'
    ];

    public function kandidat(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kandidat::class, 'kandidat_id');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    public function dpts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Dpt::class, 'relawan_id');
    }

    public function relawanParent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Relawan::class, 'relawan_id','id');
    }

    public function relawans(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Relawan::class, 'relawan_id')->with('users');
    }

    public function desa(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Desa::class, 'id_wilayah');
    }

    public function kecamatan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kecamatan::class, 'id_wilayah');
    }
    public function kabkota(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kabkota::class, 'id_wilayah');
    }

    public function collection()
    {
        if(Auth::user()->hasRole(['admin-kandidat-free', 'admin-kandidat-premium','super-admin'])){
            
            return Relawan::all();
        }
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIK',
            'KTA',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Status Perkawinan',
            'No HP',
            'Email',
            'Alamat',
        ];
    }

    public function map($relawan): array
    {
        return [
            $relawan->users->name,
            $relawan->nik,
            $relawan->no_kta,
            $relawan->tempat_lahir,
            $relawan->tanggal_lahir,
            $relawan->jenis_kelamin,
            $relawan->status_perkawinan,
            $relawan->users->contact,
            $relawan->users->email,
            $relawan->users->alamat,
        ];
    }

}
