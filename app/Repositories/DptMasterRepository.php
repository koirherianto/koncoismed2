<?php

namespace App\Repositories;

use App\Models\DptMaster;
use App\Repositories\BaseRepository;

class DptMasterRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nik',
        'nama',
        'tps',
        'id_wilayah'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return DptMaster::class;
    }
}
