<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index()
    {
        $users = User::all(); // fetch all suppliers
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
'email'=> 'required',
'password'=> 'required',
'phone'=> 'required',
'role'=> 'required',
'department'=> 'required',
            
        ]);

        // Save supplier
        User::create($request->all());

        return redirect()->route('users.index')
                         ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
       
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

           'name'=> 'required',
'email'=> 'required',
'password'=> 'required',
'phone'=> 'required',
'role'=> 'required',
'department'=> 'required',


        ]);
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // $supplier = Supplier::findOrFail($id);
        // $supplier->delete();

        // return redirect()->route('suppliers.index')->with('success', 'Record deleted successfully.');
    }
}
