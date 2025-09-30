<?php

namespace App\Http\Controllers;

use App\Models\Moverment;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;

class MovermentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          //Getting Item name
        $moverments = Moverment::with('item')->get();
        return view('moverments.index', compact('moverments'));
    }

  public function indexs()
    {
          //Getting Item name
        $moverments = Moverment::with('item')->get();
        return view('moverments.indexs', compact('moverments'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $items = Item::all();
         $users= User::all();
        return view('moverments.create', compact('items', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
'request_date'=>'required',
'request_by'=>'required',
'request_summary'=>'required',
'item_id'=>'required',
'from_department'=>'required',
'to_department'=>'required',
'user_id'=>'required',
'supplier_id'=>'required',
           
        ]);

        // Save supplier
        Moverment::create($request->all());

        return redirect()->route('moverments.index')
                         ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Moverment $moverment)
    {
         return view('moverments.show', compact('moverment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Moverment $moverment)
    {
        return view('moverments.edit', compact('moverment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moverment $moverment)
    {
        $request->validate([

'request_date'=>'required',
'request_by'=>'required',
'request_summary'=>'required',
'item_id'=>'required',
'from_department'=>'required',
'to_department'=>'required',
'user_id'=>'required',
'supplier_id'=>'required',
       


        ]);
        $moverment->update($request->all());

        return redirect()->route('moverments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moverment $moverment)
    {
        //
    }
}
