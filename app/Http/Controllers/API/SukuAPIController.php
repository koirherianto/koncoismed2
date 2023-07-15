<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSukuAPIRequest;
use App\Http\Requests\API\UpdateSukuAPIRequest;
use App\Models\Suku;
use App\Models\JenisKandidat;
use App\Repositories\SukuRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SukuAPIController
 */
class SukuAPIController extends AppBaseController
{
    private SukuRepository $sukuRepository;

    public function __construct(SukuRepository $sukuRepo)
    {
        $this->sukuRepository = $sukuRepo;
    }

    /**
     * Display a listing of the Sukus.
     * GET|HEAD /sukus
     */
    public function index(Request $request): JsonResponse
    {
        $sukus = $this->sukuRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sukus->toArray(), 'Sukus retrieved successfully');
    }

    public function getJenisKandidats() : JsonResponse {
        $JenisKandidat = JenisKandidat::all();
        return $this->sendResponse($JenisKandidat, 'Jenis Kandidat retrieved successfully');
    }

}
