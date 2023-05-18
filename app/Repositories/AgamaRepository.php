<?php

namespace App\Repositories;

use App\Models\Agama;
use App\Repositories\BaseRepository;

class AgamaRepository extends BaseRepository
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
        return Agama::class;
    }
}
