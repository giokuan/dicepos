<div class="mb-6 md:mb-8 mt-6">

    <div class="form-item mb-4">
        <label for="customer" class="text-sm font-bold text-gray-700 mb-2">Customer</label>
   
            <select wire:model="selectedCustomer" class="w-full appearance-none mt-2 text-black text-opacity-70 rounded shadow py-1 px-2 focus:outline-none focus:shadow-outline focus:border-blue-200 dark:bg-gray-600 dark:text-white" id="customer" name="customer" required>
                <option value="" selected>Choose</option>
                @foreach($customernames as $customer)
                    <option value="{{ $customer->id }} {{ $customer->name }}" @if (old('customer') == "{{ $customer->id }}") {{ 'selected' }} @endif>{{ $customer->name }}</option>
                
                @endforeach
            
            </select>

    </div>
   
   

        <div class="form-item ">
            <label for="customer_id" class="text-sm font-bold text-gray-700 mb-4 ">Customer Id</label>
  
         
                <select class="w-full appearance-none text-black text-opacity-70 rounded shadow py-1 mt-2 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 dark:bg-gray-600 dark:text-white" id="customer_id" name="customer_id" required>
                    {{-- <option value="" selected>Choose</option> --}}
                    @foreach($customerids as $customerid)
                        <option value="{{ $customerid->customer_name }}"  >{{ $customerid->customer_name}}</option>
                     
                    @endforeach
                   
                </select>
         
        </div>

</div>
