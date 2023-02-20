<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CustomerName;
use App\Models\CustomerId;

class CustomerComponentDropdown extends Component
{


    public $customernames;
    public $customerids;

    public $selectedCustomer = NULL;


    public function mount()
    {
        $this->customernames = CustomerName::all();
        $this->customerids = collect();
    }


    public function render()
    {
        return view('livewire.customer-component-dropdown');
    }


    public function updatedSelectedCustomer($customer)
    {
        if (!is_null($customer)) {
            $this->customerids = CustomerId::where('id', $customer)->get();
        }
    }
}
