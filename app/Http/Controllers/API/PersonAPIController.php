<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePersonAPIRequest;
use App\Http\Requests\API\UpdatePersonAPIRequest;
use App\Models\Person;
use App\Repositories\PersonRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\Agama;
use App\Models\Suku;
use Illuminate\Support\Facades\Auth;

/**
 * Class PersonAPIController
 */
class PersonAPIController extends AppBaseController
{
    private PersonRepository $personRepository;

    public function __construct(PersonRepository $personRepo)
    {
        $this->personRepository = $personRepo;
    }

    /**
     * Display a listing of the People.
     * GET|HEAD /people
     */
    public function index(Request $request): JsonResponse
    {
        $people = $this->personRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($people->toArray(), 'People retrieved successfully');
    }

    public function isPersonExis()
    {
        //jika PERSON/People Belum terisi
        if (Auth::user()->kandidat->persons->isEmpty()) {
            $this->response['status'] = false;
            return $this->sendResponse($this->response, 'jika false maka person empty, jalankan form');
        } else {
            $this->response['status'] = true;
            return $this->sendResponse($this->response, 'jika true maka person exist, jangan jalankan form');
        }
    }
    public function isWakilExis()
    {
        //jika kandidat adalah eksekutif {maka perlu wakil}
        if (Auth::user()->kandidat->lembaga == 'eksekutif') {
            //jika person hanya satu {jika dia belum punya wakil}
            if (Auth::user()->kandidat->persons->count() == 1) {
                $this->response['status'] = false;
                return $this->sendResponse($this->response, 'jika false maka wakil tidak exis, jalankan form wakil}');
            }else{
                $this->response['status'] = true;
            return $this->sendResponse($this->response, 'jika true maka sudah memiliki wakil, jangan jalankan form wakil');
            }
        }else{
            $this->response['status'] = true;
            return $this->sendResponse($this->response, 'jika true maka lembaga legislatif, jangan jalankan form wakil');
        }

        
    }

    public function getSetPerson()
    {
        $this->response['agama_id'] = Agama::all()->pluck('nama', 'id');
        $this->response['suku_id'] = Suku::pluck('nama', 'id');
        $this->response['kandidat_id'] = Auth::user()->kandidat->id;


        return $this->sendResponse($this->response, 'untuk form  person');
    }

    public function getSetWakil()
    {
        $this->response['agama_id'] = Agama::all()->pluck('nama', 'id');
        $this->response['suku_id'] = Suku::pluck('nama', 'id');
        $this->response['kandidat_id'] = Auth::user()->kandidat->id;

        return $this->sendResponse($this->response, 'untuk form wakil person');
    }

    /**
     * Store a newly created Person in storage.
     * POST /people
     */
    public function store(CreatePersonAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $person = $this->personRepository->create($input);

        return $this->sendResponse($person->toArray(), 'Person saved successfully');
    }

    /**
     * Display the specified Person.
     * GET|HEAD /people/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Person $person */
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            return $this->sendError('Person not foundd');
        }

        return $this->sendResponse($person->toArray(), 'Person retrieved successfully');
    }

    /**
     * Update the specified Person in storage.
     * PUT/PATCH /people/{id}
     */
    public function update($id, UpdatePersonAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Person $person */
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            return $this->sendError('Person not found');
        }

        $person = $this->personRepository->update($input, $id);

        return $this->sendResponse($person->toArray(), 'Person updated successfully');
    }

    /**
     * Remove the specified Person from storage.
     * DELETE /people/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Person $person */
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            return $this->sendError('Person not found');
        }

        $person->delete();

        return $this->sendSuccess('Person deleted successfully');
    }
}
