<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartaiRequest;
use App\Http\Requests\UpdatePartaiRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PartaiRepository;
use Illuminate\Http\Request;
use Flash;

class PartaiController extends AppBaseController
{
    /** @var PartaiRepository $partaiRepository*/
    private $partaiRepository;

    public function __construct(PartaiRepository $partaiRepo)
    {
        $this->partaiRepository = $partaiRepo;
    }

    /**
     * Display a listing of the Partai.
     */
    public function index(Request $request)
    {
        $partais = $this->partaiRepository->paginate(10);

        return view('partais.index')
            ->with('partais', $partais);
    }

    /**
     * Show the form for creating a new Partai.
     */
    public function create()
    {
        return view('partais.create');
    }

    /**
     * Store a newly created Partai in storage.
     */
    public function store(CreatePartaiRequest $request)
    {
        $input = $request->all();

        $partai = $this->partaiRepository->create($input);

        if(isset($request->partai)){
            $partai->addFromMediaLibraryRequest($request->partai)->toMediaCollection();
        }

        Flash::success('Partai saved successfully.');

        return redirect(route('partais.index'));
    }

    /**
     * Display the specified Partai.
     */
    public function show($id)
    {
        $partai = $this->partaiRepository->find($id);

        if (empty($partai)) {
            Flash::error('Partai not found');

            return redirect(route('partais.index'));
        }

        return view('partais.show')->with('partai', $partai);
    }

    /**
     * Show the form for editing the specified Partai.
     */
    public function edit($id)
    {
        $partai = $this->partaiRepository->find($id);

        if (empty($partai)) {
            Flash::error('Partai not found');

            return redirect(route('partais.index'));
        }

        return view('partais.edit')->with('partai', $partai);
    }

    /**
     * Update the specified Partai in storage.
     */
    public function update($id, UpdatePartaiRequest $request)
    {
        $partai = $this->partaiRepository->find($id);

        if (empty($partai)) {
            Flash::error('Partai not found');

            return redirect(route('partais.index'));
        }

        $partai = $this->partaiRepository->update($request->all(), $id);

        if(isset($request->partai)){
            $partai->syncFromMediaLibraryRequest($request->partai)->toMediaCollection();
        }

        Flash::success('Data partai berhasil diedit.');

        return redirect(route('partais.index'));
    }

    /**
     * Remove the specified Partai from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $partai = $this->partaiRepository->find($id);

        if (empty($partai)) {
            Flash::error('Partai not found');

            return redirect(route('partais.index'));
        }

        $this->partaiRepository->delete($id);

        Flash::success('Partai deleted successfully.');

        return redirect(route('partais.index'));
    }
}
