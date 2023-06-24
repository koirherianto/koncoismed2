<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NestedSet;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Model\Suku;

class Dpt extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $date = ['created_at'];
    
    public $table = 'pendukung';

    public $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'kontak',
        'jenis_kelamin',
        'agama_id',
        'suku_id',//aku tambahin ini
        'suku',
        'tps',
        'rt',
        'rw',
        'alamat',
        'keterangan',
        'relawan_id',
        'id_wilayah',
        'kandidat_id',
        'created_at'
    ];

    protected $casts = [
        'nama' => 'string',
        'nik' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'email' => 'string',
        'kontak' => 'string',
        'jenis_kelamin' => 'string',
        'suku_id' => 'string',
        'alamat' => 'string',
        'keterangan' => 'string',
        'kandidat_id' => 'string'
    ];

    public static $rules = [
        'nama' => 'required|string',
        'nik' => 'required|string',
        'tempat_lahir' => 'nullable|string',
        'tanggal_lahir' => 'nullable',
        'email' => 'nullable|string',
        'kontak' => 'nullable|string',
        'jenis_kelamin' => 'required|string',
        'agama_id' => 'required',
        'suku_id' => 'required|string',
        'tps' => 'nullable',
        'rt' => 'nullable',
        'rw' => 'nullable',
        'alamat' => 'nullable|string',
        'keterangan' => 'nullable|string',
        'relawan_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'id_wilayah' => 'required',
        'kandidat_id' => 'required'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gambar_ktp');
        $this->addMediaCollection('gambar_selfie');
        $this->addMediaCollection('gambar_profil');
    }

    
    public static function countDukungan()
    {
        return self::count();
    }

    public static function kinerjaRelawanPerhari()
    {
        // Hitung jumlah total DPT
        $totalDpt = self::count();

        // Hitung jumlah hari sejak pertama kali DPT ditambahkan
        $tanggalPertama = self::orderBy('created_at', 'asc')->first()->created_at->startOfDay();
        $jumlahHari = Carbon::now()->startOfDay()->diffInDays($tanggalPertama);

        // Pengecekan jika hari sama dengan nol
        $jumlahHari == 0 ? $jumlahHari = 1 : null;

        // Hitung rata-rata per hari ditambahkan
        $rataRataPerHari = $totalDpt / $jumlahHari;

        return $rataRataPerHari;
    }

    public static function kinerjaRelawanPerminggu()
    {
        // Hitung jumlah total DPT
        $totalDpt = self::count();

        // Hitung jumlah minggu sejak pertama kali DPT ditambahkan
        $tanggalPertama = self::orderBy('created_at', 'asc')->first()->created_at->startOfWeek();
        $jumlahMinggu = Carbon::now()->startOfWeek()->diffInWeeks($tanggalPertama);

        // Pengecekan jika minggu  sama dengan nol
        $jumlahMinggu == 0 ? $jumlahMinggu = 1 : null;

        // Hitung rata-rata per minggu ditambahkan
        $rataRataPerMinggu = $totalDpt / $jumlahMinggu;

        return $rataRataPerMinggu;
    }

    public static function kinerjaRelawanPerbulan()
    {
        // Hitung jumlah total DPT
        $totalDpt = self::count();

        // Hitung jumlah bulan sejak pertama kali DPT ditambahkan
        $tanggalPertama = self::orderBy('created_at', 'asc')->first()->created_at->startOfMonth();
        $jumlahBulan = Carbon::now()->startOfMonth()->diffInMonths($tanggalPertama);

         // Pengecekan jika jumlah bulan sama dengan nol
        $jumlahBulan == 0 ? $jumlahBulan = 1 : null;

        // Hitung rata-rata per bulan ditambahkan
        $rataRataPerBulan = $totalDpt / $jumlahBulan;

        return $rataRataPerBulan;
    }


    public function agama(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Agama::class, 'agama_id');
    }
    public function sukus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Suku::class, 'suku_id'); //sukunya kugani suku_id
        //suku nya ada
    }

    public function relawan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Relawan::class, 'relawan_id');
    }

    public function wilayah(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Wilayah::class, 'wilayah_id');
    }

    public function suku(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Suku::class, 'suku_id');
    }

    public function desa(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Desa::class, 'id_wilayah');
    }

    public function getCreatedAtAttribute($date)
{
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
}
}
