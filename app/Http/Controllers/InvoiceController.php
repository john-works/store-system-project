<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $invoices = Invoice::all(); // fetch all suppliers
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
                      'supplier_name'=> 'required',
'received_date'=> 'required',
'invoice_number'=> 'required',
'invoice_date'=> 'required',
'invoice_description'=> 'required',
'received_amount'=> 'required',
'invoice_currency'=> 'required',
'invoice_date'=> 'required',
            
        ]);

        // Save supplier
        Invoice::create($request->all());

        return redirect()->route('invoices.index')
                         ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
          return view('invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
         $request->validate([

            'supplier_name'=> 'required',
'received_date'=> 'required',
'invoice_number'=> 'required',
'invoice_date'=> 'required',
'invoice_description'=> 'required',
'received_amount'=> 'required',
'invoice_currency'=> 'required',
'invoice_date'=> 'required',
            


        ]);
        $invoice->update($request->all());

        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
