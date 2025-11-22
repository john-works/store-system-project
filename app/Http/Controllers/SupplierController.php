<?php

namespace App\Http\Controllers;
use App\Models\Contract;
use App\Models\Supplier;
use App\Models\Item;
use App\Models\service;
use App\Models\Good;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all(); // fetch all suppliers
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate inputs (optional but good practice)
    $request->validate([
        'supplier_name.*' => 'required|string|max:255',
        'email.*' => 'required|email',
        'phone.*' => 'required|string|max:20',
        'address.*' => 'required|string|max:255',
        'tin.*' => 'required|digits:10',
        'bank_account.*' => 'required|digits:10',
        'type_of_good.*' => 'required|string',
    ]);

    // Loop through supplier arrays
    $count = count($request->supplier_name);

    for ($i = 0; $i < $count; $i++) {
        \App\Models\Supplier::create([
            'supplier_name' => $request->supplier_name[$i],
            'email' => $request->email[$i],
            'phone' => $request->phone[$i],
            'address' => $request->address[$i],
            'tin' => $request->tin[$i],
            'bank_account' => $request->bank_account[$i],
            'type_of_good' => $request->type_of_good[$i],
        ]);
    }

    return redirect()->route('suppliers.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        
       
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([

            'supplier_name' => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'address'       => 'required',
            'tin'           => 'required|digits:10',
            'bank_account'  => 'required|digits:10',
            'type_of_good'  => 'required',


        ]);
        $supplier->update($request->all());

        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //  $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect()->route('suppliers.index')
                         ->with('success', 'Item deleted successfully.');
    }





}
