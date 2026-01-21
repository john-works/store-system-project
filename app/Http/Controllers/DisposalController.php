<?php

namespace App\Http\Controllers;

use App\Models\Disposal;
use App\Models\Item;
use App\Services\ResourceAuthorizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $disposals = ResourceAuthorizationService::filterByUserRole(
            Disposal::query()->with('item', 'user'),
            $user
        )->get();
        return view('disposals.index', compact('disposals'));
    }


      public function indexs()
{
    $user = Auth::user();
    $disposals = ResourceAuthorizationService::filterByUserRole(
        Disposal::query()->with('item', 'user'),
        $user
    )->get();
    return view('disposals.indexs', compact('disposals'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        return view('disposals.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'request_date'=> 'required',
            'request_by'=> 'required',
            'request_summary'=> 'required',
            'item_id'=> 'required',
        ]);

        // ✅ Automatically set user_id to current authenticated user
        $data = $request->all();
        $data['user_id'] = Auth::id();

        Disposal::create($data);

        return redirect()->route('disposals.index')
                         ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disposal $disposal)
    {
        return view('disposals.show', compact('disposal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disposal $disposal)
    {
        $items = Item::all(); 
        return view('disposals.edit', compact('disposal', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disposal $disposal)
    {
        $request->validate([

'request_date'=> 'required',
'request_by'=> 'required',
'request_summary'=> 'required',
'item_id'=> 'required',
// 'asset_tag'=> 'required',
// 'serial_number'=> 'required',




        ]);
        $disposal->update($request->all());
        return redirect()->route('disposals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disposal $disposal)
    {
         $disposal->delete();

    return redirect()->route('disposals.index')
        ->with('success', 'Contract deleted successfully.');
    }
}
