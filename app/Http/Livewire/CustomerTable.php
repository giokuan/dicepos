<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Customer;

use Livewire\Component;

class CustomerTable extends Component
{
    use withPagination;

    public $perPage = 10;

    public $search = '';

    public $orderBy = 'id';

    public $orderAsc = true; 


    public function render()
    {
        // return view('livewire.product-table');
        return view('livewire.customer-table',[
            'customers' => Customer::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            -> simplePaginate($this->perPage),
        ]);
    }
}
