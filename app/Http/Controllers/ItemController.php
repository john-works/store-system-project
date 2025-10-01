<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Supplier;
use App\Models\Borrowing;
use App\Models\Moverment;
use App\Models\Disposal;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
          // Eager load supplier to avoid N+1 queries
        $items = Item::with('supplier')->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all suppliers to populate the dropdown
        $suppliers = Supplier::all();
        return view('items.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'items.*.item_name' => 'required|string',
        'items.*.supplier_id' => 'required|integer',
        'items.*.unit_of_measure' => 'required|string',
        'items.*.serier_number' => 'required|integer',
        'items.*.asset_tag' => 'required|integer',
        'items.*.date_delivered' => 'required|date',
        'items.*.expiry_date' => 'required|date',
        'items.*.qty' => 'required|integer',
    ]);

    foreach ($request->items as $item) {
        \App\Models\Item::create($item);
    }

    return redirect()->route('items.index')->with('success', 'Items added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
         return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $suppliers = Supplier::all(); // get all suppliers for dropdown
    return view('items.edit', compact('item', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([

          'supplier_id'=> 'required',
'item_name'=> 'required',
'unit_of_measure'=> 'required',
'serier_number'=> 'required',
'asset_tag'=> 'required',
'date_delivered'=> 'required',
'expiry_date'=> 'required',
'qty'=> 'required',

        ]);
        $item->update($request->all());

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
