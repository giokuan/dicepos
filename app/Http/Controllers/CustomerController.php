<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\CustomerName;
use App\Models\CustomerId;

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


        $custname = new CustomerName();
        $custname->name = $customername;
        $custname->save();

        $custid = new CustomerId();
        $custid->customer_id =  $cust->id;
        $custid->customer_name = $cust->id;
        $custid->save();
        
       

        return redirect()->back()->with('success','Customer Added Successfuly'); 
       
    }
}
