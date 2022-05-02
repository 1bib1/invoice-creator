<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index(){
        
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices')); 
    }

    public function create(){
        return view('invoices.create'); 
    }

    public function edit($id){
        $invoice = Invoice::find($id);
        return view('invoices.edit', compact('invoice')); 
    }

    public function delete($id){
        $invoice = Invoice::find($id);
        $invoice->destroy($id);
        return redirect()->route('invoices.list')->with('message', 'Successfully deleted invoice.');
    }

    public function store(Request $request){
        $invoice = new Invoice(); 
        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;
        $invoice->save();

        return redirect()->route('invoices.list')->with('message', 'Invoice added to database.');
    }
    
    public function update($id, Request $request){
        
        $invoice = Invoice::find($id);
        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->total = $request->total;
        $invoice->save();

        return redirect()->route('invoices.list')->with('message', 'Successfully updated invoice.');
    }
    
    
}
