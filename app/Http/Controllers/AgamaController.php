<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgamaRequest;
use App\Http\Requests\UpdateAgamaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AgamaRepository;
use Illuminate\Http\Request;
use Flash;

class AgamaController extends AppBaseController
{
    /** @var AgamaRepository $agamaRepository*/
    private $agamaRepository;

    public function __construct(AgamaRepository $agamaRepo)
    {
        $this->agamaRepository = $agamaRepo;
    }

    /**
     * Display a listing of the Agama.
     */
    public function index(Request $request)
    {
        $agamas = $this->agamaRepository->paginate(10);

        return view('agamas.index')
            ->with('agamas', $agamas);
    }

    /**
     * Show the form for creating a new Agama.
     */
    public function create()
    {
        return view('agamas.create');
    }

    /**
     * Store a newly created Agama in storage.
     */
    public function store(CreateAgamaRequest $request)
    {
        $input = $request->all();

        $agama = $this->agamaRepository->create($input);

        Flash::success('Agama saved successfully.');

        return redirect(route('agamas.index'));
    }

    /**
     * Display the specified Agama.
     */
    public function show($id)
    {
        $agama = $this->agamaRepository->find($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        return view('agamas.show')->with('agama', $agama);
    }

    /**
     * Show the form for editing the specified Agama.
     */
    public function edit($id)
    {
        $agama = $this->agamaRepository->find($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        return view('agamas.edit')->with('agama', $agama);
    }

    /**
     * Update the specified Agama in storage.
     */
    public function update($id, UpdateAgamaRequest $request)
    {
        $agama = $this->agamaRepository->find($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        $agama = $this->agamaRepository->update($request->all(), $id);

        Flash::success('Agama updated successfully.');

        return redirect(route('agamas.index'));
    }

    /**
     * Remove the specified Agama from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $agama = $this->agamaRepository->find($id);

        if (empty($agama)) {
            Flash::error('Agama not found');

            return redirect(route('agamas.index'));
        }

        $this->agamaRepository->delete($id);

        Flash::success('Agama deleted successfully.');

        return redirect(route('agamas.index'));
    }
}
