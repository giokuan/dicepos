<?php

namespace App\Http\Livewire;
use App\Models\SupplierName;
use App\Models\SupplierId;

use Livewire\Component;

class SupplierComponentDropdown extends Component
{


    public $suppliernames;
    public $supplierids;

    public $selectedSupplier = NULL;


    public function mount()
    {
        $this->suppliernames = SupplierName::all();
        $this->supplierids = collect();
    }

    public function render()
    {
        return view('livewire.supplier-component-dropdown');
    }

    public function updatedSelectedSupplier($supplier)
    {
        if (!is_null($supplier)) {
            $this->supplierids = SupplierId::where('id', $supplier)->get();
        }
    }
}
