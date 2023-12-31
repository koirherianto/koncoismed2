<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDptMasterRequest;
use App\Http\Requests\UpdateDptMasterRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DptMasterRepository;
use Illuminate\Http\Request;
use Flash;
use App\Imports\DptMastersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\DptMaster;

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

        Flash::success('data DPT berhasil ditambahkan.');

        return redirect(route('dpt-masters.index'));
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

            return redirect(route('dpt-masters.index'));
        }

        $this->dptMasterRepository->delete($id);

        Flash::success('Data DPT berhasil dihapus.');

        return redirect(route('dpt-masters.index'));
    }

     //function untuk tampilan import DPT dengan excel
     public function importDpt()
     {
         return view('dpt_masters.import');
     }

     public function import() 
    {
        Excel::import(new DptMastersImport,request()->file('file'));
        return back();
    }

    public function downloadFormat()
    {
        $myFile = storage_path("app/public/download/import-dpt-masters.xlsx");

    	return response()->download($myFile);
    }

    public function export_excel() 
    {
        return Excel::download(new DptMaster, 'data-dpt.xlsx');
    }  
}
