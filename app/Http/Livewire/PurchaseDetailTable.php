<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PurchaseDetail;

class PurchaseDetailTable extends Component
{

    use withPagination;

    public $perPage = 10;

    public $search = '';

    public $orderBy = 'id';

    public $orderAsc = true; 


    public function render()
    {
        // return view('livewire.product-table');
        return view('livewire.purchase-detail-table',[
            'purchase_details' => PurchaseDetail::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            -> simplePaginate($this->perPage),
        ]);
    }
}
