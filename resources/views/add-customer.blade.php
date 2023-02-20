@extends('layouts.home')
@section('content')

<!-- component -->

    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-full bg-gray-200 hidden lg:block lg:w-5/12  bg-cover rounded-l-lg"
           
                > <img src="{{asset('/images/dice-logo.png')}}" alt="logo"  w-full class="hidden lg:block items-center mt-20 ml-10 justify-center"></div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Add Customer</h3>

                    <form method="post" action="{{url('save-customer')}}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="customername">
                                    Customer Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="customername" name="customername"
                                    type="text"
                                    placeholder="Customer Name"
                                />
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="contact">
                                    Contact
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="contact" name="contact"
                                    type="text"
                                    placeholder="Contact"
                                />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="address">
                                Address
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="address" name="address"
                                type="text"
                                placeholder="Address"
                            />
                        </div>

                        

                        
                        <div class="mb-6 mt-10 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Add Customer
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