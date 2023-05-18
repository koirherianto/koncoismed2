<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKandidatRequest;
use App\Http\Requests\UpdateKandidatRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\KandidatRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\JenisKandidat;
use App\Models\Kandidat;
use App\Models\Relawan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class KandidatController extends AppBaseController
{
    /** @var KandidatRepository $kandidatRepository*/
    private $kandidatRepository;

    public function __construct(KandidatRepository $kandidatRepo)
    {
        $this->kandidatRepository = $kandidatRepo;
    }

    /**
     * Display a listing of the Kandidat.
     */
    public function index(Request $request)
    {
        //jika kandidat belum terisi
        if (Auth::user()->hasAnyRole(['admin-kandidat-free', 'admin-kandidat-premium'])){
        if (empty(Auth::user()->kandidat) ) {
            return redirect(route('createKandidat'));
        }

        //jika PERSON/People Belum terisi
        if (Auth::user()->kandidat->persons->isEmpty()) {
            return redirect(route('createPerson'));
        }

        //jika kandidat adalah eksekutif {maka perlu wakil}
        if (Auth::user()->kandidat->lembaga == 'eksekutif') {
            //jika person hanya satu {jika dia belum punya wakil}
            if (Auth::user()->kandidat->persons->count() == 1) {
                return redirect(route('createWakilPerson'));
            }
        }
    }

        if (Auth::user()->hasRole('super-admin')) {
            $kandidats = $this->kandidatRepository->paginate(10);

        }elseif(Auth::user()->hasAnyRole(['admin-kandidat-free', 'admin-kandidat-premium'])){
            $kandidats = Kandidat::where('users_id',Auth::id())->paginate(10);

        }else{
            $kandidats = Kandidat::where('id',Auth::user()->relawan->kandidat_id)->paginate(10);  
        }
            return view('kandidats.index')
            ->with('kandidats', $kandidats);
    }

    /**
     * Show the form for creating a new Kandidat.
     */
    public function create()
    {
        //jika kandidat belum terisi
        if (empty(Auth::user()->kandidat) ) {
            return redirect(route('createKandidat'));
        }

        //jika PERSON/People Belum terisi
        if (Auth::user()->kandidat->persons->isEmpty()) {
            return redirect(route('createPerson'));
        }

        //jika kandidat adalah eksekutif {maka perlu wakil}
        if (Auth::user()->kandidat->lembaga == 'eksekutif') {
            //jika person hanya satu {jika dia belum punya wakil}
            if (Auth::user()->kandidat->persons->count() == 1) {
                return redirect(route('createWakilPerson'));
            }
        }

        $users = User::pluck('name','id');
        $jenis_kandidats = JenisKandidat::pluck('nama','id');
        return view('kandidats.create',compact('users', 'jenis_kandidats'));
    }

    /**
     * Store a newly created Kandidat in storage.
     */
    public function store(CreateKandidatRequest $request)
    {
        $input = $request->all();
        // //pakai DB Transaction
        $kandidat = $this->kandidatRepository->create($input);

        $relawanId = Auth::user()->relawan->id;
        $relawan = Relawan::find($relawanId);
        $relawan->kandidat_id = $kandidat->id;
        $relawan->id_wilayah = $kandidat->id_wilayah;
        $relawan->save();
        Flash::success('Kandidat saved successfully.');

        // return redirect(route('kandidats.index'));
        return redirect(route('home'));
    }
    

    /**
     * Display the specified Kandidat.
     */
    public function show($id)
    {
        //jika kandidat belum terisi
        // if (empty(Auth::user()->kandidat) ) {
        //     return redirect(route('createKandidat'));
        // }

        // //jika PERSON/People Belum terisi
        // if (Auth::user()->kandidat->persons->isEmpty()) {
        //     return redirect(route('createPerson'));
        // }

        // //jika kandidat adalah eksekutif {maka perlu wakil}
        // if (Auth::user()->kandidat->lembaga == 'eksekutif') {
        //     //jika person hanya satu {jika dia belum punya wakil}
        //     if (Auth::user()->kandidat->persons->count() == 1) {
        //         return redirect(route('createWakilPerson'));
        //     }
        // }

        $kandidat = $this->kandidatRepository->find($id);

        if (empty($kandidat)) {
            Flash::error('Kandidat not found');

            return redirect(route('kandidats.index'));
        }

        return view('kandidats.show')->with('kandidat', $kandidat);
    }

    /**
     * Show the form for editing the specified Kandidat.
     */
    public function edit($id)
    {
        // //jika kandidat belum terisi
        // if (empty(Auth::user()->kandidat) ) {
        //     return redirect(route('createKandidat'));
        // }

        // //jika PERSON/People Belum terisi
        // if (Auth::user()->kandidat->persons->isEmpty()) {
        //     return redirect(route('createPerson'));
        // }

        // //jika kandidat adalah eksekutif {maka perlu wakil}
        // if (Auth::user()->kandidat->lembaga == 'eksekutif') {
        //     //jika person hanya satu {jika dia belum punya wakil}
        //     if (Auth::user()->kandidat->persons->count() == 1) {
        //         return redirect(route('createWakilPerson'));
        //     }
        // }

        $kandidat = $this->kandidatRepository->find($id);
        $users = User::pluck('name','id');
        $jenis_kandidats = JenisKandidat::pluck('nama','id');

        if (empty($kandidat)) {
            Flash::error('Kandidat not found');

            return redirect(route('kandidats.index'));
        }

        return view('kandidats.edit',compact('kandidat','users','jenis_kandidats'));
    }

    /**
     * Update the specified Kandidat in storage.
     */
    public function update($id, UpdateKandidatRequest $request)
    {
        //jika kandidat belum terisi
        // if (empty(Auth::user()->kandidat) ) {
        //     return redirect(route('createKandidat'));
        // }

        // //jika PERSON/People Belum terisi
        // if (Auth::user()->kandidat->persons->isEmpty()) {
        //     return redirect(route('createPerson'));
        // }

        // //jika kandidat adalah eksekutif {maka perlu wakil}
        // if (Auth::user()->kandidat->lembaga == 'eksekutif') {
        //     //jika person hanya satu {jika dia belum punya wakil}
        //     if (Auth::user()->kandidat->persons->count() == 1) {
        //         return redirect(route('createWakilPerson'));
        //     }
        // }

        $kandidat = $this->kandidatRepository->find($id);

        if (empty($kandidat)) {
            Flash::error('Kandidat not found');

            return redirect(route('kandidats.index'));
        }

        $kandidat = $this->kandidatRepository->update($request->all(), $id);

        Flash::success('Kandidat updated successfully.');

        return redirect(route('kandidats.index'));
    }

    /**
     * Remove the specified Kandidat from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        //jika kandidat belum terisi
        // if (empty(Auth::user()->kandidat) ) {
        //     return redirect(route('createKandidat'));
        // }

        // //jika PERSON/People Belum terisi
        // if (Auth::user()->kandidat->persons->isEmpty()) {
        //     return redirect(route('createPerson'));
        // }

        // //jika kandidat adalah eksekutif {maka perlu wakil}
        // if (Auth::user()->kandidat->lembaga == 'eksekutif') {
        //     //jika person hanya satu {jika dia belum punya wakil}
        //     if (Auth::user()->kandidat->persons->count() == 1) {
        //         return redirect(route('createWakilPerson'));
        //     }
        // }

        $kandidat = $this->kandidatRepository->find($id);

        if (empty($kandidat)) {
            Flash::error('Kandidat not found');

            return redirect(route('kandidats.index'));
        }

        $this->kandidatRepository->delete($id);

        Flash::success('Kandidat deleted successfully.');

        return redirect(route('kandidats.index'));
    }
}
