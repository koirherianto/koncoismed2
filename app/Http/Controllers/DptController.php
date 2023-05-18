<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDptRequest;
use App\Http\Requests\UpdateDptRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DptRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use App\Models\Agama;
use App\Models\Kandidat;
use App\Models\Suku;
use App\Models\Dpt;
use App\Models\Relawan;
use DB;

class DptController extends AppBaseController
{
    /** @var DptRepository $dptRepository*/
    private $dptRepository;

    public function __construct(DptRepository $dptRepo)
    {
        $this->dptRepository = $dptRepo;
    }

    /**
     * Display a listing of the Dpt.
     */
    public function index(Request $request)
    {
        $dpts=[];
        $dataRelawanDpt=[];
        if (Auth::user()->hasRole('super-admin')) {
            $dpts = $this->dptRepository->paginate(10);

            return view('dpts.index')->with('dpts', $dpts);

            //admin-kandidat list dpt
        }elseif(Auth::user()->hasAnyRole('admin-kandidat-free','admin-kandidat-premium')){
            //ambil idkandidat si adminkandidat
            $idRelawan = Auth::user()->relawan->id;

            //$dataRelawanId = Relawan::where('relawan_id', $idRelawan)->get();
            //tarik dpt dari relawan
            $dataRelawanDpt = Relawan::where('relawan_id', $idRelawan)
            ->with('dpts')
            ->get()
            ->toTree();
           
            //$dataRelawanDpt = Relawan::with('dpts')->get()->toTree();
            // return $dataRelawanDPt;
            // $dpts = Dpt::where($idKandidatDpt,$idKandidatAdmin)->paginate(10);
            return view('dpts.index',compact('dataRelawanDpt'))
            ->with('dpts', $dpts);
        
        }else{//relawan list dpt
            //tarik relawan_id
            $idRelawan = Auth::user()->relawan->id;
            //return $idRelawan;

            //tarik dpt from relawan
            $dataRelawanDpt = Relawan::where('id', $idRelawan)
            ->with('dpts')
            ->get();

            //dd($dataRelawanDpt);
            //return $dataRelawanDpt;
            return view('dpts.index',compact('dataRelawanDpt'))
            ->with('dpts', $dpts);

        }
        // return view('dpts.index',compact('dataRelawanDpt'))
        //     ->with('dpts', $dpts);
    }

    /**
     * Show the form for creating a new Dpt.
     */
    public function create()
    {
        
        $agamas = Agama::pluck('nama','id');
        $sukus = Suku::pluck('nama','id');
        return view('dpts.create',compact('agamas','sukus'));
    }

    /**
     * Store a newly created Dpt in storage.
     */
    public function store(CreateDptRequest $request)
    {
        $input = $request->all();

        $idRelawanku = Auth::user()->relawan->id;
        $idKandidatku = Auth::user()->relawan->kandidat->id;

        if(Dpt::where('nik',$request->nik)
        ->where('relawan_id', $idRelawanku)
        ->where('kandidat_id', $idKandidatku)
        ->exists()){

            Flash::warning('Dpt can not input.');
            return redirect(route('dpts.index'));
        }else{

        $dpt = $this->dptRepository->create($input);

        if(isset($request->dpt)){
            $dpt->addFromMediaLibraryRequest($request->dpt)->toMediaCollection();
        }

        Flash::success('Dpt saved successfully.');

        return redirect(route('dpts.index'));
    }
    }

    /**
     * Display the specified Dpt.
     */
    public function show($id)
    {
        $dpt = $this->dptRepository->find($id);

        if (empty($dpt)) {
            Flash::error('Dpt not found');

            return redirect(route('dpts.index'));
        }

        return view('dpts.show')->with('dpt', $dpt);
    }

    /**
     * Show the form for editing the specified Dpt.
     */
    public function edit($id)
    {
        $agamas = Agama::pluck('nama','id');
        $sukus = Suku::pluck('nama','id');
        $dpt = $this->dptRepository->find($id);

        if (empty($dpt)) {
            Flash::error('Dpt not found');

            return redirect(route('dpts.index'));
        }

        //return view('dpts.edit')->with('dpt', $dpt);
        return view('dpts.edit',compact('agamas','dpt','sukus'));
    }

    /**
     * Update the specified Dpt in storage.
     */
    public function update($id, UpdateDptRequest $request)
    {
        $dpt = $this->dptRepository->find($id);

        if (empty($dpt)) {
            Flash::error('Dpt not found');

            return redirect(route('dpts.index'));
        }

        $dpt = $this->dptRepository->update($request->all(), $id);

        if(isset($request->dpt)){
            $dpt->syncFromMediaLibraryRequest($request->dpt)->toMediaCollection();
        }

        Flash::success('Dpt updated successfully.');

        return redirect(route('dpts.index'));
    }

    /**
     * Remove the specified Dpt from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dpt = $this->dptRepository->find($id);

        if (empty($dpt)) {
            Flash::error('Dpt not found');

            return redirect(route('dpts.index'));
        }

        $this->dptRepository->delete($id);

        Flash::success('Dpt deleted successfully.');

        return redirect(route('dpts.index'));
    }
}
