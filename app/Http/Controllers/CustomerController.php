<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function addCustomer(){

        return view('add-customer');
    }


    public function allCustomer(){
        $customers = Customer::get();
      
        return view('all-customer', compact('customers'));
    }


    public function saveCustomer(Request $request){
        $request-> validate([
            'customername'=>'required',
            'contact'=>'required',
            'address'=>'required',
       
        ]);
    
        $customername = $request->customername;
        $contact = $request->contact;
        $address= $request->address;
    
        $cust= new Customer();
        $cust->customername = $customername;
        $cust->contact = $contact;
        $cust->address = $address;
        
        $cust->save();

        return redirect()->back()->with('success','Customer Added Successfuly'); 
       
    }
}
