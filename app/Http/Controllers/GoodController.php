<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
          $goods = Good::all(); // fetch all suppliers
        return view('goods.index', compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('goods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
                           
        'supplier_name'=>'required',
'request_date'=>'required',
'request_by'=>'required',
'verified_by'=>'required',
'invoice_number'=>'required',
'item__description'=>'required',
'quality'=>'required',

            
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Good $good)
    {
        return view('goods.edit', compact('good'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Good $good)
    {
        $request->validate([

               'supplier_name'=>'required',
'request_date'=>'required',
'request_by'=>'required',
'verified_by'=>'required',
'invoice_number'=>'required',
'item__description'=>'required',
'quality'=>'required',

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
