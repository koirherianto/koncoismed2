<?php

namespace App\Repositories;

use App\Models\Suku;
use App\Repositories\BaseRepository;

class SukuRepository extends BaseRepository
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
        return Suku::class;
    }
}
