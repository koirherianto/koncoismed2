<?php

namespace App\Repositories;

use App\Models\Relawan;
use App\Repositories\BaseRepository;

class RelawanRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'users_id',
        'relawan_id',
        'kandidat_id',
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
        return Relawan::class;
    }
}
