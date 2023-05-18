<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKandidatAPIRequest;
use App\Http\Requests\API\UpdateKandidatAPIRequest;
use App\Models\Kandidat;
use App\Repositories\KandidatRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\JenisKandidat;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Auth;

/**
 * Class KandidatAPIController
 */
class KandidatAPIController extends AppBaseController
{
    private KandidatRepository $kandidatRepository;
    private $response;

    public function __construct(KandidatRepository $kandidatRepo)
    {
        $this->kandidatRepository = $kandidatRepo;
    }

    /**
     * Display a listing of the Kandidats.
     * GET|HEAD /kandidats
     */
    public function index(Request $request): JsonResponse
    {
        $kandidats = $this->kandidatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kandidats->toArray(), 'Kandidats retrieved successfully');
    }

    public function isKandidatExis()
    {
        //jika kandidat belum terisi
        if (empty(Auth::user()->kandidat) ) {
            $this->response['status'] = false;
            return $this->sendResponse($this->response, 'kandidat belum terisi, jalankan form');
        }

        $this->response['status'] = true;
            return $this->sendResponse($this->response, 'kandidat sudah terisi, jangan jalankan form');
    }

    public function getSetKandidat()
    {
        $this->response['users_id'] = Auth::id();
        $this->response['jenis_kandidat_id'] = JenisKandidat::all()->pluck('nama','id');
        $this->response['wilayah_id'] = Wilayah::all()->pluck('nama','id');

        return $this->sendResponse($this->response, 'Data set');
    }
    
    /**
     * Store a newly created Kandidat in storage.
     * POST /kandidats
     */
    public function store(CreateKandidatAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $kandidat = $this->kandidatRepository->create($input);

        return $this->sendResponse($kandidat->toArray(), 'Kandidat saved successfully');
    }

    /**
     * Display the specified Kandidat.
     * GET|HEAD /kandidats/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Kandidat $kandidat */
        $kandidat = $this->kandidatRepository->find($id);

        if (empty($kandidat)) {
            return $this->sendError('Kandidat not found');
        }

        return $this->sendResponse($kandidat->toArray(), 'Kandidat retrieved successfully');
    }
    
    

    /**
     * Update the specified Kandidat in storage.
     * PUT/PATCH /kandidats/{id}
     */
    public function update($id, UpdateKandidatAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Kandidat $kandidat */
        $kandidat = $this->kandidatRepository->find($id);

        if (empty($kandidat)) {
            return $this->sendError('Kandidat not found');
        }

        $kandidat = $this->kandidatRepository->update($input, $id);

        return $this->sendResponse($kandidat->toArray(), 'Kandidat updated successfully');
    }

    /**
     * Remove the specified Kandidat from storage.
     * DELETE /kandidats/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Kandidat $kandidat */
        $kandidat = $this->kandidatRepository->find($id);

        if (empty($kandidat)) {
            return $this->sendError('Kandidat not found');
        }

        $kandidat->delete();

        return $this->sendSuccess('Kandidat deleted successfully');
    }
}
