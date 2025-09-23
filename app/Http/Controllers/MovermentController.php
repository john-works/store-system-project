<?php

namespace App\Http\Controllers;

use App\Models\Moverment;
use Illuminate\Http\Request;

class MovermentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $moverments = Moverment::all(); // fetch all suppliers
        return view('moverments.index', compact('moverments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('moverments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
// 'request_date' =>'required',
// 'request_by' =>'required',
// 'request_summary' =>'required',
// 'current_step' =>'required',
// 'status' =>'required',
'item_description' =>'required',
'asset_tag' =>'required',
'serial_number' =>'required',
'from_department' =>'required',
'from_user' =>'required',
'to_department' =>'required',
'to_user' =>'required',
           
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

//             'request_date' =>'required',
// 'request_by' =>'required',
// 'request_summary' =>'required',
// 'current_step' =>'required',
// 'status' =>'required',
'item_description' =>'required',
'asset_tag' =>'required',
'serial_number' =>'required',
'from_department' =>'required',
'from_user' =>'required',
'to_department' =>'required',
'to_user' =>'required',
       


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
