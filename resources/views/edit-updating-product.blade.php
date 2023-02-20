@extends('layouts.home')
@section('content')

<!-- component -->
@foreach($updates as $update)

@endforeach

    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-full bg-gray-200 hidden lg:block lg:w-5/12  bg-cover rounded-l-lg"
           
                > <img src="{{asset('/images/dice-logo.png')}}" alt="logo"  w-full class="hidden lg:block items-center mt-4 ml-10 justify-center"></div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Update This Product to Stocks</h3>

                    <form method="post" action="{{url('update-stock-product')}}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- <input type="hidden" value="{{ $data->id }}" name="id" /> --}}
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="productname">
                                    Product Id
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="productname" name="productname"
                                    type="text"
                                    value="{{$update->productname}}"
                                />
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="stocks">
                                    Stocks
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="stocks2" name="stocks2"
                                    type="text"
                                    value="{{$update->stocks}}"
                                />
                            </div>
                        </div>

                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="stocks">
                                Quantity
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="product_quantity" name="product_quantity"
                                type="text"
                                value="{{$update->product_quantity}}"
                            />
                        </div>
                  
                        <div class="mb-6 mt-10 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Update Product
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                    
                   
                    </form>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </div>

 @endsection