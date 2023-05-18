<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peta;

class RelawanMapController extends Controller
{
    public function __construct()
    {
        $this->Peta = new Peta();
    }

    public function index(Request $request)
    {
        return view('maps.relawan');
    }

    public function jsonRelawan()
    {
        $results = $this->Peta->allDataRelawan();
        return json_encode($results);
    }
}
