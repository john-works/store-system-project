<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Item;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //Getting Item name
        $borrowings = Borrowing::with('item')->get();
        return view('borrowings.index', compact('borrowings'));
    }

        public function indexs()
{
    $borrowings = Borrowing::with('item')->get();
    return view('borrowings.indexs', compact('borrowings'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $items = Item::all();
        return view('borrowings.create', compact('items'));
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
// 'asset_tag'=> 'required',
// 'serial_number'=> 'required',


        ]);

        // Save supplier
        Borrowing::create($request->all());


    //         Workflow::create([
    //     'borrowing_id' => $borrowing->id,
    //     'step_name' => 'Borrow Request Created',
    //     'user_id' => Auth::id(),
    //     'is_completed' => false,
    //     'approved_status' => 'pending',
    // ]);


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
         $items = Item::all(); 
        return view('borrowings.edit', compact('borrowing', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
// 'request_date'=> 'required',
// 'request_by'=> 'required',
// 'request_summary'=> 'required',
'item_id'=> 'required',
// 'asset_tag'=> 'required',
// 'serial_number'=> 'required',



        ]);
        $borrowing->update($request->all());
        return redirect()->route('borrowings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
         $borrowing->delete();

    return redirect()->route('borrowings.index')
        ->with('success', 'Contract deleted successfully.');
    }
}
