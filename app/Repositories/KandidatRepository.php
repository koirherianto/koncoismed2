<?php

namespace App\Repositories;

use App\Models\Kandidat;
use App\Repositories\BaseRepository;

class KandidatRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'kontak',
        'jenis_kelamin',
        'agama_id',
        'suku',
        'tps',
        'rt',
        'rw',
        'alamat',
        'keterangan',
        'wilayah_id',
        'relawan_id',
        'id_wilayah'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Kandidat::class;
    }
}
