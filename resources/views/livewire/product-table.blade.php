<div class="shadow-xl pl-2 pr-2">
    <p class="flex justify-center items-center mb-6 text-xl">List of All Products</p>
    <div class="w-full flex flex-col md:flex-row  pb-10">
        <div class="w-full md:w-3/6 mx-1">
            <label class="text-xs ">Search</label>
            <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-1 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 shadow-lg"placeholder="Search products...">
        </div>
        <div class="w-full md:w-1/6 mx-1">
            <label class="text-xs">Filter by</label>
            <select wire:model="orderBy" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 shadow-lg" id="grid-state">
                {{-- <option value="id">ID</option> --}}
                <option value="productname">Product</option>
                <option value="description">Description</option>
                <option value="supplier">Supplier</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="w-full md:w-1/6  mx-1">
            <label class="text-xs">Sort by</label>
            <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 shadow-lg" id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="w-full md:w-1/6 mx-1">
            <label class="text-xs">Display by</label>
            <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 shadow-lg" id="grid-state">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
    </div>
    <div class="overflow-auto">
    <table class="table-auto w-full mb-6 overflow-x-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Product Id</th>
                <th class="px-4 py-2">Product Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Stocks</th>
                <th class="px-4 py-2">Cost</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Supplier</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            
                <tr>
                  
                    <td class="border px-3 py-2 dark:border-gray-500" >{{ ucfirst($product->id) }}</td>
                    <td class="border px-3 py-2 dark:border-gray-500" >{{ ucfirst($product->productname) }}</td>
                    <td class="border px-4 py-2 dark:border-gray-500">{{ ucfirst($product->description) }}</td>
                    <td class="border px-4 py-2 dark:border-gray-500">{{number_format($product->stocks + $product->product_quantity) }}</td>
                    <td class="border px-4 py-2 dark:border-gray-500">{{ $product->cost }}</td>
                    <td class="border px-4 py-2 dark:border-gray-500">{{ $product->price }}</td>
                    <td class="border px-4 py-2 dark:border-gray-500">{{ $product->supplier }}</td>
                 
                  
                    <td class="flex items-center justify-center border px-4 py-2 gap-6 dark:border-gray-500">
                        
                        
                   
                        <a href="{{url('edit-product-stock/'.$product->id)}}" > <button> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#3F83F8" class="w-6 h-6 mr-2">
                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                        </svg></button>
                        </a>

                
                        <a href="{{url('delete-product/'.$product->id)}}" > 
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#F05252" class="w-6 h-6" >
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                            </svg>
                        </a>
                                

               
                    </td>

             
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {!! $products->links() !!}
    @include('sweetalert::alert')


</div>

