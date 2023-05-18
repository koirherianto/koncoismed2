<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJenisKandidatRequest;
use App\Http\Requests\UpdateJenisKandidatRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\JenisKandidatRepository;
use Illuminate\Http\Request;
use Flash;

class JenisKandidatController extends AppBaseController
{
    /** @var JenisKandidatRepository $jenisKandidatRepository*/
    private $jenisKandidatRepository;

    public function __construct(JenisKandidatRepository $jenisKandidatRepo)
    {
        $this->jenisKandidatRepository = $jenisKandidatRepo;
    }

    /**
     * Display a listing of the JenisKandidat.
     */
    public function index(Request $request)
    {
        $jenisKandidats = $this->jenisKandidatRepository->paginate(10);

        return view('jenis_kandidats.index')
            ->with('jenisKandidats', $jenisKandidats);
    }

    /**
     * Show the form for creating a new JenisKandidat.
     */
    public function create()
    {
        return view('jenis_kandidats.create');
    }

    /**
     * Store a newly created JenisKandidat in storage.
     */
    public function store(CreateJenisKandidatRequest $request)
    {
        $input = $request->all();

        $jenisKandidat = $this->jenisKandidatRepository->create($input);

        Flash::success('Jenis Kandidat saved successfully.');

        return redirect(route('jenisKandidats.index'));
    }

    /**
     * Display the specified JenisKandidat.
     */
    public function show($id)
    {
        $jenisKandidat = $this->jenisKandidatRepository->find($id);

        if (empty($jenisKandidat)) {
            Flash::error('Jenis Kandidat not found');

            return redirect(route('jenisKandidats.index'));
        }

        return view('jenis_kandidats.show')->with('jenisKandidat', $jenisKandidat);
    }

    /**
     * Show the form for editing the specified JenisKandidat.
     */
    public function edit($id)
    {
        $jenisKandidat = $this->jenisKandidatRepository->find($id);

        if (empty($jenisKandidat)) {
            Flash::error('Jenis Kandidat not found');

            return redirect(route('jenisKandidats.index'));
        }

        return view('jenis_kandidats.edit')->with('jenisKandidat', $jenisKandidat);
    }

    /**
     * Update the specified JenisKandidat in storage.
     */
    public function update($id, UpdateJenisKandidatRequest $request)
    {
        $jenisKandidat = $this->jenisKandidatRepository->find($id);

        if (empty($jenisKandidat)) {
            Flash::error('Jenis Kandidat not found');

            return redirect(route('jenisKandidats.index'));
        }

        $jenisKandidat = $this->jenisKandidatRepository->update($request->all(), $id);

        Flash::success('Jenis Kandidat updated successfully.');

        return redirect(route('jenisKandidats.index'));
    }

    /**
     * Remove the specified JenisKandidat from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jenisKandidat = $this->jenisKandidatRepository->find($id);

        if (empty($jenisKandidat)) {
            Flash::error('Jenis Kandidat not found');

            return redirect(route('jenisKandidats.index'));
        }

        $this->jenisKandidatRepository->delete($id);

        Flash::success('Jenis Kandidat deleted successfully.');

        return redirect(route('jenisKandidats.index'));
    }
}
