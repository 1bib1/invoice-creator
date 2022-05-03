<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
            $request->validate([
                'name' => 'required|min:3',
                'address' => 'required|min:5',
                'tin' => 'required|min:8'
            ]);

            $customer = new Customer(); 

            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->tin = $request->tin;
            
            $customer->save();

            return redirect()->route('customers.index')->with('message', 'Customer added to database.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::with('invoices')->where('id', $id)->firstOrFail();
        return view('customers.single', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::Find($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $customer = Customer::Find($id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->tin = $request->tin;

        $customer->save();

        return redirect()->route('customers.index')->with('message', 'Successfully updated customer information.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::destroy($id);
        return redirect()->route('customers.index')->with('message', 'Successfully deleted customer.');
    }
}
