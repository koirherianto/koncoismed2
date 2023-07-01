<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDptMasterRequest;
use App\Http\Requests\UpdateDptMasterRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DptMasterRepository;
use Illuminate\Http\Request;
use Flash;

class DptMasterController extends AppBaseController
{
    /** @var DptMasterRepository $dptMasterRepository*/
    private $dptMasterRepository;

    public function __construct(DptMasterRepository $dptMasterRepo)
    {
        $this->dptMasterRepository = $dptMasterRepo;
    }

    /**
     * Display a listing of the DptMaster.
     */
    public function index(Request $request)
    {
        $dptMasters = $this->dptMasterRepository->paginate(10);

        return view('dpt_masters.index')
            ->with('dptMasters', $dptMasters);
    }

    /**
     * Show the form for creating a new DptMaster.
     */
    public function create()
    {
        return view('dpt_masters.create');
    }

    /**
     * Store a newly created DptMaster in storage.
     */
    public function store(CreateDptMasterRequest $request)
    {
        $input = $request->all();

        $dptMaster = $this->dptMasterRepository->create($input);

        Flash::success('Dpt Master saved successfully.');

        return redirect(route('dptMasters.index'));
    }

    /**
     * Display the specified DptMaster.
     */
    public function show($id)
    {
        $dptMaster = $this->dptMasterRepository->find($id);

        if (empty($dptMaster)) {
            Flash::error('Dpt Master not found');

            return redirect(route('dptMasters.index'));
        }

        return view('dpt_masters.show')->with('dptMaster', $dptMaster);
    }

    /**
     * Show the form for editing the specified DptMaster.
     */
    public function edit($id)
    {
        $dptMaster = $this->dptMasterRepository->find($id);

        if (empty($dptMaster)) {
            Flash::error('Dpt Master not found');

            return redirect(route('dptMasters.index'));
        }

        return view('dpt_masters.edit')->with('dptMaster', $dptMaster);
    }

    /**
     * Update the specified DptMaster in storage.
     */
    public function update($id, UpdateDptMasterRequest $request)
    {
        $dptMaster = $this->dptMasterRepository->find($id);

        if (empty($dptMaster)) {
            Flash::error('Dpt Master not found');

            return redirect(route('dptMasters.index'));
        }

        $dptMaster = $this->dptMasterRepository->update($request->all(), $id);

        Flash::success('Dpt Master updated successfully.');

        return redirect(route('dptMasters.index'));
    }

    /**
     * Remove the specified DptMaster from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dptMaster = $this->dptMasterRepository->find($id);

        if (empty($dptMaster)) {
            Flash::error('Dpt Master not found');

            return redirect(route('dptMasters.index'));
        }

        $this->dptMasterRepository->delete($id);

        Flash::success('Dpt Master deleted successfully.');

        return redirect(route('dptMasters.index'));
    }
}
