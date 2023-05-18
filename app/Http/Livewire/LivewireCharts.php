<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use App\Models\Relawan;
use App\Models\Desa;
use Illuminate\Support\Facades\Auth;

class LivewireCharts extends Component
{
    public $barChartRelawanDesa;

    public function mount()
    {
        //ambil id kandidat
        $idKandidat = Auth::user()->relawan->kandidat_id;

        //barchart relawan berdasarkan desa
        $barChartRelawanDesa = DB::table('relawan')
        ->join('desa', 'relawan.id_wilayah', '=', 'desa.id')
        ->select(DB::raw('count(*) as total, id_wilayah'))
        ->where('kandidat_id',$idKandidat)
        ->groupBy('id_wilayah')
        ->orderBy('total','desc')
        ->get();

        //dd($barChartRelawanDesa);
        // foreach($barChartRelawanDesa as $item){
        //     $data['label'][] = $item->id_wilayah;
        //     $data['data'][] = $item->total;
        // }
    //     dd($data);
        //ubah ke json
       $this->barChartRelawanDesa = json_encode($barChartRelawanDesa);

       $chartkota = json_encode($barChartRelawanDesa);
        //d=d($this->barChartRelawanDesa);
        //dd($chartkota);
        }
    
    public function render()
    {
        return view('livewire.livewire-charts');
        // return view('livewire.livewire-charts', [
        //     'barChartRelawanDesa',
        // ]);
    }
}
