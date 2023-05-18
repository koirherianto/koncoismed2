<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWilayahAPIRequest;
use App\Http\Requests\API\UpdateWilayahAPIRequest;
use App\Repositories\WilayahRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\Provinsi;
use App\Models\Kabkota;
use App\Models\Kecamatan;
use App\Models\Desa;

/**
 * Class WilayahAPIController
 */
class WilayahAPIController extends AppBaseController
{
    // private WilayahRepository $wilayahRepository;

    // public function __construct(WilayahRepository $wilayahRepo)
    // {
    //     $this->wilayahRepository = $wilayahRepo;
    // }

    /**
     * Display a listing of the Wilayahs.
     * GET|HEAD /wilayahs
     */
    public function index(Request $request): JsonResponse
    {
        $wilayahs = $this->wilayahRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($wilayahs->toArray(), 'Wilayahs retrieved successfully');
    }

    public function getProvinsi()
    {
        $provinsi = Provinsi::all();

        return $this->sendResponse($provinsi->toArray(), 'Provinsi Didapatkan');
    }

    public function getKabKota(Request $request)
    {
        $request = $request->all();
        $kabkota = Kabkota::where('provinsi_id', $request['provinsi_id'])->get();

        if (count($kabkota) === 0) {
            return $this->sendError('Kabupaten kota tidak ada',200);
        }

        return $this->sendResponse($kabkota->toArray(), 'Kabupaten / kota di dapatkan');
    }

    public function getKecamatan(Request $request)
    {
        $request = $request->all();
        $kecamatan = kecamatan::where('kabkota_id', $request['kabkota_id'])->get();

        if (count($kecamatan) === 0) {
            return $this->sendError('Kecamatan tidak ada', 200);
        }

        return $this->sendResponse($kecamatan->toArray(), 'kecamatan di dapatkan');
    }

    public function getDesa(Request $request)
    {
        $request = $request->all();
        $desa = Desa::where('kecamatan_id', $request['kecamatan_id'])->get();

        if (count($desa) === 0) {
            return $this->sendError('desa tidak ada', 200);
        }

        return $this->sendResponse($desa->toArray(), 'desa di dapatkan');
    }

    public function detailWilayahById(Request $request)
    {
        $id = $request['id'];

        $provinsi = Provinsi::find($id);
        if (!is_null($provinsi)) {
            $provinsi['tingkat'] = 'provinsi';
            // $provinsi['nama'] = $provinsi['provinsi'];
            $provinsi['provinsi_id'] = $provinsi['id'];

            return $this->sendResponse($provinsi->toArray(), $provinsi['tingkat'] . ' di dapatkan');
        }

        $kabkota = Kabkota::find($id);
        if (!is_null($kabkota)) {
            $kabkota['tingkat'] = 'kab/kota';
            // $kabkota['nama'] = $kabkota['kabkota'];
            $kabKota_id = $kabkota['kabkota_id'] = $kabkota['id'];

            $provinsi = Provinsi::find($kabkota->provinsi_id);
            $provinsi_id = $kabkota['provinsi_id'] = $provinsi->id;

            return $this->sendResponse($kabkota->toArray(), $kabkota['tingkat'] . ' di dapatkan');
        }

        $kecamatan = Kecamatan::find($id);
        if (!is_null($kecamatan)) {
            $kecamatan['tingkat'] = 'kecamatan';
            // $kecamatan['nama'] = $kecamatan['kecamatan'];
            $kecamatanId = $kecamatan['kecamatan_id'] = $kecamatan['id'];
            
            $kabkota = Kabkota::find($kecamatan->kabkota_id);
            $kabkotaId = $kecamatan['kabkota_id'] = $kabkota->id;

            $provinsiId = $kecamatan['provinsi_id'] = $kabkota->provinsi_id;

            return $this->sendResponse($kecamatan->toArray(), $kecamatan['tingkat'] . ' di dapatkan');
        }

        $kelDesa = Desa::find($id);
        if (!is_null($kelDesa)) {
            $kelDesa['tingkat'] = 'kel/desa';
            // $kelDesa['nama'] = $kelDesa['desa'];
            $kelDesa['desa_id'] = $kelDesa['id'];

            $kecamatanId = $kelDesa['kecamatan_id'] = $kelDesa->kecamatan_id;

            $kecamatan = Kecamatan::find($kecamatanId);
            $kabkotaId = $kelDesa['kabkota_id'] = $kecamatan->kabkota_id;

            $kabKota = KabKota::find($kabkotaId);
            $provinsiId = $kelDesa['provinsi_id'] = $kabKota->provinsi_id;

            return $this->sendResponse($kelDesa->toArray(), $kelDesa['tingkat'] . ' di dapatkan');
        }
    }

    function returnx($data)
    {
        return $this->sendResponse($data->toArray(), 'desa di dapatkan');
    }
}
