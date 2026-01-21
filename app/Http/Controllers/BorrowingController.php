<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Item;
use App\Services\ResourceAuthorizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $borrowings = ResourceAuthorizationService::filterByUserRole(
            Borrowing::query()->with('item', 'user'),
            $user
        )->get();
        return view('borrowings.index', compact('borrowings'));
    }

        public function indexs()
{
    $user = Auth::user();
    $borrowings = ResourceAuthorizationService::filterByUserRole(
        Borrowing::query()->with('item', 'user'),
        $user
    )->get();
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
        ]);

        // ✅ Automatically set user_id to current authenticated user
        $data = $request->all();
        $data['user_id'] = Auth::id();
        
        Borrowing::create($data);


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
