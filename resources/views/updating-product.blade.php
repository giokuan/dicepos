@extends('layouts.home')
@section('content')



{{-- @foreach($updates as $update)


@endforeach --}}



<table class="table-auto w-full mb-6 overflow-x-auto">
    <thead>
        <tr>
            <th class="px-4 py-2">Product Name</th>
            <th class="px-4 py-2">Stocks</th>
            <th class="px-4 py-2">Purchase Quantity</th>
            <th class="px-4 py-2">Status</th>
    
            <th class="px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($updates as $update)
        
            <tr>
              
                <td class="border px-3 py-2 dark:border-gray-500" >{{ ucfirst($update->productname) }}</td>
                <td class="border px-4 py-2 dark:border-gray-500">{{ ucfirst($update->stocks) }}</td>
                <td class="border px-4 py-2 dark:border-gray-500">{{ ucfirst($update->product_quantity) }}</td>
                <td class="border px-4 py-2 dark:border-gray-500"></td>
           
             
              
                <td class="flex items-center justify-center border px-4 py-2 gap-6 dark:border-gray-500">
                    
                    
               
                    <a href="{{url('edit-updating-product/'.$update->id)}}" > <button> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#3F83F8" class="w-6 h-6 mr-2">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg></button>
                    </a>

            
                    <a href="{{url('delete-product/'.$update->id)}}" > 
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#F05252" class="w-6 h-6" >
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                        </svg>
                    </a>
                            

           
                </td>

         
            </tr>
        @endforeach
    </tbody>
</table>








@endsection