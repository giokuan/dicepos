<div class="mb-6 md:mb-8 mt-6">

    <div class="form-item mb-4">
        <label for="supplier" class="text-sm font-bold text-gray-700 mb-2">Supplier</label>
   
            <select wire:model="selectedSupplier" class="w-full appearance-none mt-2 text-black text-opacity-70 rounded shadow py-1 px-2 focus:outline-none focus:shadow-outline focus:border-blue-200 dark:bg-gray-600 dark:text-white" id="supplier" name="supplier" required>
                <option value="" selected>Choose</option>
                @foreach($suppliernames as $supplier)
                    <option value="{{ $supplier->id }} {{ $supplier->name }}" @if (old('supplier') == "{{ $supplier->id }}") {{ 'selected' }} @endif>{{ $supplier->name }}</option>
                
                @endforeach
            
            </select>

    </div>
   
   

        <div class="form-item ">
            <label for="supplier_id" class="text-sm font-bold text-gray-700 mb-4 ">Supplier Id</label>
  
         
                <select class="w-full appearance-none text-black text-opacity-70 rounded shadow py-1 mt-2 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 dark:bg-gray-600 dark:text-white" id="supplier_id" name="supplier_id" required>
                    {{-- <option value="" selected>Choose</option> --}}
                    @foreach($supplierids as $supplierid)
                        <option value="{{ $supplierid->supplier_name }}"  >{{ $supplierid->supplier_name}}</option>
                     
                    @endforeach
                   
                </select>
         
        </div>

</div>