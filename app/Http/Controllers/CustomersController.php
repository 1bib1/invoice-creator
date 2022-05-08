<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('user_id', Auth::id())->get();
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
    public function store(CustomerRequest $request)
    {       
            $customer = new Customer(); 

            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->tin = $request->tin;
            $customer->user_id = Auth::id();
            $customer->save();

            return redirect()->route('customers.index')->with('message', 'Customer added to database.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {

        $customer = Customer::Find($id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->tin = $request->tin;
        $customer->user_id = Auth::id();
        $customer->save();

        return redirect()->route('customers.index')->with('message', 'Successfully updated customer information.');
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
