<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Product;

use Livewire\Component;

class ProductTable extends Component
{

    use withPagination;

    public $perPage = 10;

    public $search = '';

    public $orderBy = 'id';

    public $orderAsc = true; 


    public function render()
    {
        // return view('livewire.product-table');
        return view('livewire.product-table',[
            'products' => Product::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            -> simplePaginate($this->perPage),
        ]);
    }
}
