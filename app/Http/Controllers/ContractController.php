<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Supplier;
use App\Services\ResourceAuthorizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $contracts = ResourceAuthorizationService::filterByUserRole(
            Contract::query()->with(['supplier', 'workflows', 'user']),
            $user
        )->get();
        return view('contracts.index', compact('contracts'));
    }


    public function info()
    {
        $contracts = Contract::with(['supplier', 'workflows'])->get();
        return view('contracts.info', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          // Get all suppliers to populate the dropdown
        $suppliers = Supplier::all();
        return view('contracts.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|string',
            'procurement_type' => 'required|string',
            'amount_cost' => 'required|string',
            'signing_date' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'procument_subject' => 'required|string',
            'termination_clauses' => 'required|string',
        ]);

        // ✅ Automatically set user_id to current authenticated user
        $data = $request->all();
        $data['user_id'] = Auth::id();

        $contract = Contract::create($data);

        // Initialize workflow - create first step
        $firstWorkflowStep = \App\Models\WorkflowStep::orderBy('step_order')->first();

        if ($firstWorkflowStep) {
            $contract->workflows()->create([
                'user_id' => auth()->id(),
                'is_completed' => false,
                'approved_status' => null,
                'workflow_steps_id' => $firstWorkflowStep->id,
            ]);
        }

        return redirect()->route('contracts.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        $contract->load(['supplier', 'workflows']);
        return view('contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $suppliers = Supplier::all(); // get all suppliers for dropdown
        return view('contracts.edit', compact('contract', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $request->validate([

           'supplier_id' => 'required|string',
           'procurement_type' => 'required|string',
           'amount_cost' => 'required|string',
           'signing_date' => 'required|string',
           'start_date' => 'required|string',
           'end_date' => 'required|string',
           'procument_subject' => 'required|string',
           'termination_clauses' => 'required|string',

        ]);
        $contract->update($request->all());

        return redirect()->route('contracts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
         $contract->delete();

        return redirect()->route('contracts.index')
            ->with('success', 'Contract deleted successfully.');
    }

    /**
     * Approve the current workflow step, move to next step or complete workflow.
     */
    public function approveWorkflowStep(Contract $contract)
    {
        $currentStep = $contract->workflows()->where('is_completed', false)->first();

        if ($currentStep) {
            // Mark current step as approved and completed
            $currentStep->update([
                'is_completed' => true,
                'approved_status' => true,
                'date_completed' => now(),
            ]);

            // Get next workflow step
            $nextStep = \App\Models\WorkflowStep::where('step_order', '>', $currentStep->workflow_steps->step_order)
                ->orderBy('step_order')
                ->first();

            if ($nextStep) {
                // Create new workflow step
                $contract->workflows()->create([
                    'user_id' => auth()->id(),
                    'is_completed' => false,
                    'approved_status' => null,
                    'workflow_steps_id' => $nextStep->id,
                ]);
            } else {
                // Mark workflow completed
                // assuming you have a method or attribute for overall workflow completion
            }
        }

        return redirect()->back()->with('success', 'Workflow step approved.');
    }

    /**
     * Reject current workflow step.
     */
    public function rejectWorkflowStep(Contract $contract)
    {
        $currentStep = $contract->workflows()->where('is_completed', false)->first();

        if ($currentStep) {
            $currentStep->update([
                'is_completed' => true,
                'approved_status' => false,
                'date_completed' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Workflow step rejected.');
    }
}
