<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSukuRequest;
use App\Http\Requests\UpdateSukuRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SukuRepository;
use Illuminate\Http\Request;
use Flash;

class SukuController extends AppBaseController
{
    /** @var SukuRepository $sukuRepository*/
    private $sukuRepository;

    public function __construct(SukuRepository $sukuRepo)
    {
        $this->sukuRepository = $sukuRepo;
    }

    /**
     * Display a listing of the Suku.
     */
    public function index(Request $request)
    {
        $sukus = $this->sukuRepository->paginate(10);

        return view('sukus.index')
            ->with('sukus', $sukus);
    }

    /**
     * Show the form for creating a new Suku.
     */
    public function create()
    {
        return view('sukus.create');
    }

    /**
     * Store a newly created Suku in storage.
     */
    public function store(CreateSukuRequest $request)
    {
        $input = $request->all();

        $suku = $this->sukuRepository->create($input);

        Flash::success('Suku saved successfully.');

        return redirect(route('sukus.index'));
    }

    /**
     * Display the specified Suku.
     */
    public function show($id)
    {
        $suku = $this->sukuRepository->find($id);

        if (empty($suku)) {
            Flash::error('Suku not found');

            return redirect(route('sukus.index'));
        }

        return view('sukus.show')->with('suku', $suku);
    }

    /**
     * Show the form for editing the specified Suku.
     */
    public function edit($id)
    {
        $suku = $this->sukuRepository->find($id);

        if (empty($suku)) {
            Flash::error('Suku not found');

            return redirect(route('sukus.index'));
        }

        return view('sukus.edit')->with('suku', $suku);
    }

    /**
     * Update the specified Suku in storage.
     */
    public function update($id, UpdateSukuRequest $request)
    {
        $suku = $this->sukuRepository->find($id);

        if (empty($suku)) {
            Flash::error('Suku not found');

            return redirect(route('sukus.index'));
        }

        $suku = $this->sukuRepository->update($request->all(), $id);

        Flash::success('Suku updated successfully.');

        return redirect(route('sukus.index'));
    }

    /**
     * Remove the specified Suku from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $suku = $this->sukuRepository->find($id);

        if (empty($suku)) {
            Flash::error('Suku not found');

            return redirect(route('sukus.index'));
        }

        $this->sukuRepository->delete($id);

        Flash::success('Suku deleted successfully.');

        return redirect(route('sukus.index'));
    }
}
