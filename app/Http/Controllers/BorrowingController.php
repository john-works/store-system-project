<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::all(); // fetch all suppliers
        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrowings.create');
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
'item_name' => 'required',
'asset_tag' => 'required',
'comment' => 'required',
'status' => 'required',

        ]);

        // Save supplier
        Borrowing::create($request->all());

        return redirect()->route('borrowings.index')
                         ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
         return view('borrowings.show', compact('borrowing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        return view('borrowings.edit', compact('borrowing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
'request_date' => 'required',
'request_by' => 'required',
'request_summary' => 'required',
'item_name' => 'required',
'asset_tag' => 'required',
'comment' => 'required',
'status' => 'required',


        ]);
        $borrowing->update($request->all());

        return redirect()->route('borrowings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        //
    }
}
