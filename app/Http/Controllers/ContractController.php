<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Eager load supplier to avoid N+1 queries
        $contracts = Contract::with('supplier')->get();
        return view('contracts.index', compact('contracts'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          // Get all suppliers to populate the dropdown
        $suppliers = Supplier::all();
        return view('contracts.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
                           
        'supplier_id' => 'required|string',
'procurement_type' => 'required|string',
'amount_cost' => 'required|string',
'signing_date' => 'required|string',
'start_date' => 'required|string',
'end_date' => 'required|string',
'procument_subject' => 'required|string',
'termination_clauses' => 'required|string',
            
        ]);

        // Save supplier
        Contract::create($request->all());

        return redirect()->route('contracts.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $suppliers = Supplier::all(); // get all suppliers for dropdown
    return view('contracts.edit', compact('contract', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $request->validate([

           'supplier_id' => 'required|string',
'procurement_type' => 'required|string',
'amount_cost' => 'required|string',
'signing_date' => 'required|string',
'start_date' => 'required|string',
'end_date' => 'required|string',
'procument_subject' => 'required|string',
'termination_clauses' => 'required|string',

        ]);
        $contract->update($request->all());

        return redirect()->route('contracts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
