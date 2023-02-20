<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Supplier;

use Livewire\Component;

class SupplierTable extends Component
{
    use withPagination;

    public $perPage = 10;

    public $search = '';

    public $orderBy = 'id';

    public $orderAsc = true; 


    public function render()
    {
        // return view('livewire.product-table');
        return view('livewire.supplier-table',[
            'suppliers' => Supplier::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            -> simplePaginate($this->perPage),
        ]);
    }
}
