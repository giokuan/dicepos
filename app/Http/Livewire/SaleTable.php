<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Sale;

use Livewire\Component;

class SaleTable extends Component
{

    use withPagination;

    public $perPage = 10;

    public $search = '';

    public $orderBy = 'id';

    public $orderAsc = true; 



    public function render()
    {
        // return view('livewire.sale-table');
        return view('livewire.sale-table',[
            'sales' => Sale::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            -> simplePaginate($this->perPage),
        ]);
    }
}
