<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRelawanRequest;
use App\Http\Requests\UpdateRelawanRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RelawanRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;

use App\Models\Kandidat;
use App\Models\User;
use App\Models\Relawan;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;

use App\Imports\RelawansImport;
use Maatwebsite\Excel\Facades\Excel;

class RelawanController extends AppBaseController
{
    /** @var RelawanRepository $relawanRepository*/
    private $relawanRepository;

    public function __construct(RelawanRepository $relawanRepo)
    {
        $this->relawanRepository = $relawanRepo;
    }
    /**
     * Display a listing of the Relawan.
     */
    public function index(Request $request)
    {   
        //super-admin
        $relawans=[];
        $dataRelawanRelawan=[];
        if (Auth::user()->hasRole('super-admin')) {
            $relawans = $this->relawanRepository->paginate(10); 
        }
        //admin-kandidat
        else if(Auth::user()->hasAnyRole(['admin-kandidat-free', 'admin-kandidat-premium'])){
            $relawans = Relawan::where('kandidat_id',Auth::user()->kandidat->id)->paginate(10);
        }else{
            $dataRelawanRelawan = Relawan::where('id',Auth::user()->relawan->id)->with('relawans')->first();
            // return $dataRelawanRelawan;
            if(!is_null($dataRelawanRelawan->descendants)){
                $dataRelawanRelawan = $dataRelawanRelawan;
            }else{
                // return $dataRelawanRelawan->descendants;
                $dataRelawanRelawan['descendants'] =[];
            }
        }
        return view('relawans.index',compact('dataRelawanRelawan'))->with('relawans', $relawans);
    }

    /**
     * Show the form for creating a new Relawan.
     */
    public function create(){
    {
        if (Auth::user()->hasRole('admin-kandidat-free')){
            if (Auth::user()->relawan->count() > 2) {
                return redirect(route('relawanpenuh'));
            }
        }

        $users = User::pluck('name','id');
        $kandidats = Kandidat::pluck('id');
        $relawan_ids = Relawan::pluck('id');
        return view('relawans.create',compact('users', 'kandidats','relawan_ids'));
        }
    }

    /**
     * Store a newly created Relawan in storage.
     */
    public function store(CreateRelawanRequest $request)
    {
        try{
            DB::beginTransaction();
        $user = User::create([
            'name' => $request['name'],
            'contact' => $request['contact'],
            'email' => $request['email'],
            'alamat' => $request['alamat'],
            'password' => Hash::make($request['password']),
        ]);
        $user->save();
        
        if (Auth::user()->hasRole(['admin-kandidat-free','relawan-free'])) {
        $user->assignRole('relawan-free');
        }

        if (Auth::user()->hasRole(['admin-kandidat-premium','relawan-premium'])) {
        $user->assignRole('relawan-premium');
        }

        //data relawan
        $relawan = Relawan::create([
            'users_id' => $user->id,
            'relawan_id' => $request['relawan_id'],
            'kandidat_id' => $request['kandidat_id'],
            'status' => $request['status'],
            'id_wilayah' => $request['id_wilayah'],
            'no_kta' => $request['no_kta'],
            'nik' => $request['nik'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'status_perkawinan' => $request['status_perkawinan'],
        ]);
        $relawan->save();
        
        if(isset($request->relawan)){
            $relawan->addFromMediaLibraryRequest($request->relawan)->toMediaCollection();
        }

        DB::commit();
        Flash::success("Data berhasil ditambahkan");
        // return $user;
        }catch (Exception $e){
        DB::rollBack();
        Flash::error($e);   
    }
        return redirect(route('relawans.index'));
    }

    /**
     * Display the specified Relawan.
     */
    public function show($id)
    {
        $relawan = $this->relawanRepository->find($id);

        if (empty($relawan)) {
            Flash::error('Relawan not found');

            return redirect(route('relawans.index'));
        }

        return view('relawans.show')->with('relawan', $relawan);
    }

    /**
     * Show the form for editing the specified Relawan.
     */
    public function edit($id)
    {
        $relawan = $this->relawanRepository->find($id);
        $users = User::pluck('name','id');
        $kandidats = Kandidat::pluck('id');
        $relawan_ids = Relawan::pluck('id');

        if (empty($relawan)) {
            Flash::error('Relawan not found');

            return redirect(route('relawans.index'));
        }

        return view('relawans.edit', compact('relawan','users','kandidats','relawan_ids'));
    }

    /**
     * Update the specified Relawan in storage.
     */
    public function update($id, UpdateRelawanRequest $request)
    {
        $relawan = $this->relawanRepository->find($id);

        if (empty($relawan)) {
            Flash::error('Relawan not found');

            return redirect(route('relawans.index'));
        }

        $relawan = $this->relawanRepository->update($request->all(), $id);

        if(isset($request->relawan)){
            $relawan->syncFromMediaLibraryRequest($request->relawan)->toMediaCollection();
        }

        Flash::success('Relawan updated successfully.');

        return redirect(route('relawans.index'));
    }

    /**
     * Remove the specified Relawan from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $relawan = $this->relawanRepository->find($id);

        if (empty($relawan)) {
            Flash::error('Relawan not found');

            return redirect(route('relawans.index'));
        }

        $this->relawanRepository->delete($id);

        Flash::success('Relawan deleted successfully.');

        return redirect(route('relawans.index'));
    }

    public function tambahRelawanPenuh()
    {
            if (Auth::user()->relawan->count() > 2) {
                return view('relawans.relawanpenuhDua');
            }
    }

    //function untuk tampilanimport relawan dengan excel
    public function importRelawan()
    {
        return view('relawans.import');
    }

    //import data relawan
    public function import() 
    {
        Excel::import(new RelawansImport,request()->file('file'));
        return back();
    }

    public function downloadFormat()
    {
        $myFile = storage_path("app/public/download/coba-import.xlsx");

    	return response()->download($myFile);
    }
}
