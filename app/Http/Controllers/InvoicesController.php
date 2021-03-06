<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use App\Models\Customer;
use App\Http\Requests\InvoiceRequest;

class InvoicesController extends Controller
{
    public function index(){
        
        $invoices = Invoice::where('user_id', Auth::id())->get();
        return view('invoices.index', compact('invoices')); 
    }

    public function create(){
        $customers = Customer::where('user_id', Auth::id())->get();
        return view('invoices.create', compact('customers')); 
    }

    public function edit($id){
        $invoice = Invoice::find($id);
        return view('invoices.edit', compact('invoice')); 
    }

    public function destroy($id){
        $invoice = Invoice::find($id);
        $invoice->destroy($id);
        return redirect()->route('invoices.index')->with('message', 'Successfully deleted invoice.');
    }

    public function store(InvoiceRequest $request){

        $invoice = new Invoice(); 

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;
        $invoice->customer_id = $request->customer;
        $invoice->user_id = Auth::id();
        $invoice->save();

        return redirect()->route('invoices.index')->with('message', 'Invoice added to database.');
    }
    
    public function update($id, InvoiceRequest $request){
        
        $invoice = Invoice::find($id);

        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;
        $invoice->user_id = Auth::id();
        $invoice->save();

        return redirect()->route('invoices.index')->with('message', 'Successfully updated invoice.');
    }
    
}
