<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgamaAPIRequest;
use App\Http\Requests\API\UpdateAgamaAPIRequest;
use App\Models\Agama;
use App\Repositories\AgamaRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class AgamaAPIController
 */
class AgamaAPIController extends AppBaseController
{
    private AgamaRepository $agamaRepository;

    public function __construct(AgamaRepository $agamaRepo)
    {
        $this->agamaRepository = $agamaRepo;
    }

    /**
     * Display a listing of the Agamas.
     * GET|HEAD /agamas
     */
    public function index(Request $request): JsonResponse
    {
        $agamas = $this->agamaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($agamas->toArray(), 'Agamas success');
    }
}
