<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PersonRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\Suku;
use App\Models\Agama;
use App\Models\Kandidat;
use Illuminate\Support\Facades\Auth;
use App\Models\Person;

class PersonController extends AppBaseController
{
    /** @var PersonRepository $personRepository*/
    private $personRepository;

    public function __construct(PersonRepository $personRepo)
    {
        $this->personRepository = $personRepo;
    }

    /**
     * Display a listing of the Person.
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole(['admin-kandidat-free', 'admin-kandidat-premium'])){
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
    }

        if (Auth::user()->hasRole('super-admin')) {
            $people = $this->personRepository->paginate(10);

        }elseif(Auth::user()->hasRole(['admin-kandidat-free', 'admin-kandidat-premium'])) {
            $people = Person::where('kandidat_id',Auth::user()->kandidat->id)->paginate(10);
        }else{
            $people = Person::where('kandidat_id',Auth::user()->relawan->kandidat_id)->paginate(10);  
        }

        return view('people.index')
            ->with('people', $people);
    }

    /**
     * Show the form for creating a new Person.
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

        $agamas = Agama::pluck('nama', 'id');
        $sukus = Suku::pluck('nama', 'id');

        $userId = Auth::id();
        $kandidat = Kandidat::where('users_id', $userId)->first()->get();
        $kandidatId = $kandidat[0]->id;

        return view('people.create', compact('agamas', 'sukus', 'kandidatId'));
    }

    /**
     * Store a newly created Person in storage.
     */
    public function store(CreatePersonRequest $request)
    {
        // return 'shit';
        $input = $request->all();

        $person = $this->personRepository->create($input);

        Flash::success('Person saved successfully.');

        // return redirect(route('people.index'));
        return redirect(route('home'));
    }

    /**
     * Display the specified Person.
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

        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        return view('people.show')->with('person', $person);
    }

    /**
     * Show the form for editing the specified Person.
     */
    public function edit($id)
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

        $person = $this->personRepository->find($id);
        $agamas = Agama::pluck('nama', 'id');
        $sukus = Suku::pluck('nama', 'id');


        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        return view('people.edit', compact('person', 'agamas', 'sukus'));
    }

    /**
     * Update the specified Person in storage.
     */
    public function update($id, UpdatePersonRequest $request)
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

        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        $person = $this->personRepository->update($request->all(), $id);

        Flash::success('Person updated successfully.');

        return redirect(route('people.index'));
    }

    /**
     * Remove the specified Person from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
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

        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        $this->personRepository->delete($id);

        Flash::success('Person deleted successfully.');

        return redirect(route('people.index'));
    }
}
