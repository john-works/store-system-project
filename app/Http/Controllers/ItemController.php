<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
          $items = Item::all(); // fetch all suppliers
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
                           
           'supplier_name'=> 'required',
'item_name'=> 'required',
'unit_of_measure'=> 'required',
'serier_number'=> 'required',
'asset_tag'=> 'required',
'date_delivered'=> 'required',
'expiry_date'=> 'required',
'qty'=> 'required',
            
        ]);

        // Save supplier
        Item::create($request->all());

        return redirect()->route('items.index');
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
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([

          'supplier_name'=> 'required',
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
