<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use App\Models\Item;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //Getting Item name
        $requisitions = Requisition::with('item')->get();
        return view('requisitions.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        return view('requisitions.create', compact('items'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
'request_date' => 'required',
'request_by' => 'required',
'request_summary' => 'required',
'item_id' => 'required',
'asset_tag'=>'required',
'serial_number ' =>'required',
            
        ]);

        // Save supplier
        Requisition::create($request->all());

        return redirect()->route('requisitions.index')
                         ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Requisition $requisition)
    {
         return view('requisitions.show', compact('requisition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requisition $requisition)
    {
          return view('requisitions.edit', compact('requisition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requisition $requisition)
    {
        $request->validate([

'request_date' => 'required',
'request_by' => 'required',
'request_summary' => 'required',
'item_id' => 'required',
'asset_tag'=>'required',
'serial_number ' =>'required',


        ]);
        $requisition->update($request->all());

        return redirect()->route('requisitions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requisition $requisition)
    {
        //
    }
}
