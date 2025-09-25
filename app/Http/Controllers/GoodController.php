<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Supplier;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
         // Eager load supplier to avoid N+1 queries
        $goods = Good::with('supplier')->get();
        return view('goods.index', compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Get all suppliers to populate the dropdown
        $suppliers = Supplier::all();
        return view('goods.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
                           
        'supplier_id'=>'required',
'request_date'=>'required',
'request_by'=>'required',
'invoice_number'=>'required',
// 'verified_by'=> 'required',
'item__description'=>'required',
'quality'=>'required',
'invoice_value'=>'required',
'request_item'=>'required',

        
        ]);

        // Save supplier
        Good::create($request->all());

        return redirect()->route('goods.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Good $good)
    {
        return view('goods.show', compact('good'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Good $good)
    {
        $suppliers = Supplier::all(); // get all suppliers for dropdown
    return view('goods.edit', compact('good', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Good $good)
    {
        $request->validate([

               'supplier_id'=>'required',
'request_date'=>'required',
'request_by'=>'required',
'invoice_number'=>'required',
'item__description'=>'required',
'quality'=>'required',
'invoice_value'=>'required',
'request_item'=>'required',

        ]);
        $good->update($request->all());

        return redirect()->route('goods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Good $good)
    {
        //
    }
}
