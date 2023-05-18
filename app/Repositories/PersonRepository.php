<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\BaseRepository;

class PersonRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'kontak',
        'jenis_kelamin',
        'alamat',
        'agama_id',
        'suku_id',
        'jabatan',
        'kandidat_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Person::class;
    }
}
