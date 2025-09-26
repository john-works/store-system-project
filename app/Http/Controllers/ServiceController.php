<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
          // Eager load supplier to avoid N+1 queries
        $services = service::with('supplier')->get();
        return view('services.index', compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Get all suppliers to populate the dropdown
        $suppliers = Supplier::all();
        return view('services.create', compact('suppliers'));
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
// 'quality'=>'required',
'invoice_value'=>'required',
'request_item'=>'required',


        ]);

        // Save supplier
        Service::create($request->all());

        return redirect()->route('services.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
        $suppliers = Supplier::all(); // get all suppliers for dropdown
    return view('services.edit', compact('service', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        $request->validate([

'supplier_id'=>'required',
'request_date'=>'required',
'request_by'=>'required',
'invoice_number'=>'required',
// 'verified_by'=> 'required',
'item__description'=>'required',
// 'quality'=>'required',
'invoice_value'=>'required',
'request_item'=>'required',

        ]);
        $service->update($request->all());

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
        //
    }
}
