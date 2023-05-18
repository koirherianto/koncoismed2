<?php

namespace App\Repositories;

use App\Models\Wilayah;
use App\Repositories\BaseRepository;

class WilayahRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama',
        'tingkat',
        'wilayah_id',
        'left',
        'right'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Wilayah::class;
    }
}
