<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use App\Models\Item;
use App\Services\ResourceAuthorizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $requisitions = ResourceAuthorizationService::filterByUserRole(
            Requisition::query()->with('item', 'user'),
            $user
        )->get();
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

        // ✅ Automatically set user_id to current authenticated user
        $data = $request->all();
        $data['user_id'] = Auth::id();
        
        Requisition::create($data);

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
