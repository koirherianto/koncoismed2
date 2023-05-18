<?php

namespace App\Repositories;

use App\Models\JenisKandidat;
use App\Repositories\BaseRepository;

class JenisKandidatRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama',
        'tingkat',
        'lembaga'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return JenisKandidat::class;
    }
}
