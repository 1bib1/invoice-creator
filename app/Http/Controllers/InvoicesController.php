<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;

class InvoicesController extends Controller
{
    public function index(){
        
        $invoices = Invoice::with('customer')->get();
        return view('invoices.index', compact('invoices')); 
    }

    public function create(){
        $customers = Customer::all();
        return view('invoices.create', compact('customers')); 
    }

    public function edit($id){
        $invoice = Invoice::find($id);
        return view('invoices.edit', compact('invoice')); 
    }

    public function delete($id){
        $invoice = Invoice::find($id);
        $invoice->destroy($id);
        return redirect()->route('invoices.index')->with('message', 'Successfully deleted invoice.');
    }

    public function store(InvoiceStoreRequest $request){

        $invoice = new Invoice(); 

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;
        $invoice->customer_id = $request->customer;

        $invoice->save();

        return redirect()->route('invoices.index')->with('message', 'Invoice added to database.');
    }
    
    public function update($id, InvoiceUpdateRequest $request){
        
        $invoice = Invoice::find($id);
        
        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;
        $invoice->save();

        return redirect()->route('invoices.index')->with('message', 'Successfully updated invoice.');
    }
    
}
