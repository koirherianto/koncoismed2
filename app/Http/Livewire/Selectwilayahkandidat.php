<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use App\Models\Kabkota;
use App\Models\Provinsi;
use App\Models\JenisKandidat;
  
class Selectwilayahkandidat extends Component
{
    public $provinsis;
    public $kabkotas;
    public $jeniskandidats;
  
    public $selectedProvinsi = NULL;
    public $selectedKabkota = NULL;
    public $selectedJenis = null;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function mount()
    {
        $this->jeniskandidats = JenisKandidat::pluck('nama','id');
        $this->provinsis = Provinsi::all();
        $this->kabkotas = collect();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.selectwilayahkandidat');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updatedSelectedProvinsi($provinsi)
    {
        if (!is_null($provinsi)) {
            $this->kabkotas = Kabkota::where('provinsi_id', $provinsi)->get();
        }
    }
}
