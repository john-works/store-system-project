<?php

namespace App\Http\Controllers;
use App\Models\Contract;
use App\Models\Supplier;
use App\Models\Item;
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
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'email'         => 'required|email|unique:suppliers,email',
            'phone'         => 'required|string|max:20',
            'address'       => 'required|string|max:255',
            'tin'           => 'required|digits:10',
            'bank_account'  => 'required|digits:10',
            'type_of_good'  => 'required|string',
        ]);

        // Save supplier
        Supplier::create($request->all());

        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier created successfully.');
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
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Record deleted successfully.');
    }





}
