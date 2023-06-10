<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRelawanAPIRequest;
use App\Http\Requests\API\UpdateRelawanAPIRequest;
use App\Models\Relawan;
use App\Repositories\RelawanRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabkota;
use App\Models\Kecamatan;
use App\Models\Desa;
use Flash;
use Illuminate\Support\Facades\Hash;

class RelawanAPIController extends AppBaseController
{
    private RelawanRepository $relawanRepository;

    public function __construct(RelawanRepository $relawanRepo)
    {
        $this->relawanRepository = $relawanRepo;
    }

    public function FunctionName(Type $var = null)
    {
        $dataRelawanRelawan = Relawan::where('id',Auth::user()->relawan->id)->with('users')->with('relawans',function ($q){
            $q->with('relawans');
        })->get();

        return $this->sendResponse($dataRelawanRelawan, 'Relawan saved successfully');
    }

    public function index(Request $request)
    {
        $dataRelawans = Relawan::where('id',Auth::user()->relawan->id)->first();
        $dataRelawans =  $dataRelawans->relawans;

        foreach ($dataRelawans as $relawan) {
            // return $relawan->id_wilayah;
            $relawan['wilayah'] = $this->wilayahById((int)$relawan->id_wilayah);
        }
        return $this->sendResponse($dataRelawans, 'Relawan saved successfully');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:250',
            'contact' => 'required|unique:users,contact',
            'email' => 'required|email:dns|unique:users,email',
            'alamat' => 'required',
            'password' => 'required|min:6',
            'passwordConfirm' => 'required|same:password',
            'id_wilayah' => 'required',
            'no_kta' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'date|required',
            'status_perkawinan' => '',
            'kandidat_id' => '',
            'users_id' => ''
                 
        ],[
            'name.required' => '*Wajib di isi',
            'name.min' => 'Nama minimal 3 karakter',
            'contact.required' => '*Wajib di isi',
            'contact.min' => 'No Ponsel minimal 5 karakter',
            'contact.unique' => 'No Ponsel sudah terdaftar',
            'email.required' => '*Wajib di isi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'alamat.required' => '*Wajib di isi',
            'password.required' => '*Wajib di isi',
            'password.min' => 'Kata sandi minimal 3 karakter',
            'passwordConfirm.required' => '*Wajib di isi',
            'passwordConfirm.same' => 'Kata sandi tidak sesuai',
        ]);

        if ($validator->fails()) {
            $this->response['success'] = false;
            $this->response['error'] = $validator->errors();
            return response()->json($this->response, 200);
        }

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
        
        if (Auth::user()->hasRole('admin-kandidat-free') || Auth::user()->hasRole('admin-kandidat-premium')) {
            $relawanId = !empty(auth()->user()->relawan)?auth()->user()->relawan->id : null;
            $kandidatId = Auth::user()->kandidat->id;
        }

        if (Auth::user()->hasRole('relawan-free') || Auth::user()->hasRole('relawan-premium')) {
            $relawanId = Auth::user()->relawan->id;
            $kandidatId = Auth::user()->relawan->kandidat->id;
        }

        $relawan = Relawan::create([
            'users_id' => $user->id,
            'relawan_id' => $relawanId,
            'kandidat_id' => $kandidatId,
            'status' => $request['tingkat_wilayah'],
            'id_wilayah' => (int)$request['id_wilayah'],
            'no_kta' => $request['no_kta'],
            'nik' => $request['nik'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'status_perkawinan' => $request['status_perkawinan'],
        ]);
        $relawan->save();
        $relawan->load(['users']);
        $relawan['wilayah'] = $this->wilayahById($relawan->id_wilayah);
        DB::commit();

    }catch (Exception $e){
        DB::rollBack();
        Flash::error($e);   
    }
        return $this->sendResponse($relawan->toArray(), 'Relawan saved successfully');
    }

    public function show($id)
    {
        $dataRelawans = Relawan::where('id',$id)->first();

        $dataRelawans =  $dataRelawans->relawans; 

        foreach ($dataRelawans as $relawan) {
            $relawan['wilayah'] = $this->wilayahById($relawan->id_wilayah);
        }

        return $this->sendResponse($dataRelawans, 'Relawan savedd successfully');
    }

    public function updatePass($id,request $request)
    {
        $relawanId = Relawan::find($id)->users_id;
        $userPassword = user::find($relawanId)->password;

        $hash = Hash::check($request->passwordLama, $userPassword);

        if (!$hash) {
            $this->response['status'] = 'failed';
            $this->response['error'] = ['passwordLama' => ['Password Anda Tidak Sesuai']];
            return response()->json($this->response,200);
        }

        $validator = Validator::make($request->all(), [
            'passwordLama' => 'required|min:6|max:255',
            'passwordBaru' => 'required|min:6|max:255',
            'passwordConfirm' => 'same:passwordBaru',
        ],[
            'passwordLama.min' => 'Kata Sandi minimal 6 karakter',
            'passwordBaru.min' => 'Kata Sandi minimal 6 karakter',
            'passwordConfirm.same' => 'Kata sandi tidak cocok'
        ]);

        if ($validator->fails()) {
            $this->response['status'] = 'failed';
            $this->response['error'] = $validator->errors();
            return response()->json($this->response,200);
        }

        #Update the new Password
        $user = User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->passwordBaru)
        ]);

        $this->response['status'] = 'success';
        $this->response['data'] = $user;

        return response()->json($this->response,200);
    }

    public function update($id,request $request)
    {

        $relawanId = Relawan::find($id)->users_id;
        $relawan = Relawan::find($id);
        $user = User::find($relawanId);
        // return $user->contact . ' fd ' . $request->contact;
        $contactValidation = $user->contact == $request->contact ? '' : '|unique:users,contact';
        $emailValidation = $user->email == $request->email ? '' : '|unique:users,email';
        // return $user->contact;
        //  return User::where('contact',$request->contact)->get();
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:250',
            'contact' => 'required' . $contactValidation,
            'email' => 'required|email:dns' . $emailValidation,
            'alamat' => 'required',
            'tingkat_wilayah' => 'required',
            'id_wilayah' => 'required',
            'no_kta' => '',
            'nik' => '',
            'jenis_kelamin' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => $request->all()['tanggal_lahir'] ?? ''  == '' ? '' : 'date',
            'status_perkawinan' => '',
        ],[
            'name.required' => '*Wajib di isi',
            'name.min' => 'Nama minimal 3 karakter',
            'contact.required' => '*Wajib di isi',
            'email.required' => '*Wajib di isi',
            'email.email' => '*Email anda tidak valid',
            'alamat.required' => '*Wajib di isi',
            'tingkat_wilayah.required' => '*Wajib di isi',
            'id_wilayah.required' => '*Wajib di isi',
        ]);

        $id_wilayah = $request->all()['id_wilayah'] == 0 ? null : $request->all()['id_wilayah'];

        if ($validator->fails()) {
            $this->response['success'] = false;
            $this->response['error'] = $validator->errors();
            return response()->json($this->response, 200);
        }

        try{
            DB::beginTransaction();
            $request->all()['id_wilayah'] = $id_wilayah;
            $relawan->update($request->all());
            $relawan->save();
            $user->update($request->all());
            $user->save();

            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            Flash::error($e);   
        }    
        
        $relawan['status_perkawinan'] = $this->statusPernikahanById($relawan['status_perkawinan']);
        $relawan['jenis_kelamin'] = $this->genderRelawanById($relawan['jenis_kelamin']);
        $relawan['wilayah'] = $this->wilayahById($relawan->id_wilayah);
        // $relawan['jenis_kelamin'] = $request->all()['jenis_kelamin'] == 1 ? 'P' : 'L';
        return $this->sendResponse($relawan->load(['users']), 'Relawan saved successfully');
        
    }

    public function destroy($id): JsonResponse
    {
        // try{
            // DB::beginTransaction();
            // $user = User::create([
            //     'name' => $request['name'],
            //     'contact' => $request['contact'],
            //     'email' => $request['email'],
            //     'alamat' => $request['alamat'],
            //     'password' => Hash::make($request['password']),
            // ]);
            // $user->save();
            

            // $user->assignRole('relawan');
            // //data relawan
            // $relawan = Relawan::create([
            //     'users_id' => $user->id,
            //     'relawan_id' => Auth::user()->relawan->id,
            //     'kandidat_id' => $request['kandidat_id'],
            //     'wilayah_id' => $request['wilayah_id'],
            // ]);
            // $relawan->save();
        

            // return $this->sendResponse($relawan->toArray(), 'Relawan saved successfully');

        //     }catch (Exception $e){
        //         DB::rollBack();
        //         Flash::error($e);   
        //     }
                
        // }
        
        // /** @var Relawan $relawan */
        // $relawan = $this->relawanRepository->find($id);

        // if (empty($relawan)) {
        //     return $this->sendError('Relawan not found');
        // }

        // $relawan->delete();

        // return $this->sendSuccess('Relawan deleted successfully');
    }
}
