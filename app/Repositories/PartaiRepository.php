<?php

namespace App\Repositories;

use App\Models\Partai;
use App\Repositories\BaseRepository;

class PartaiRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Partai::class;
    }
}
