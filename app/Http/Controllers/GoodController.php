<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Supplier;
use App\Services\ResourceAuthorizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $goods = ResourceAuthorizationService::filterByUserRole(
            Good::query()->with(['supplier', 'workflows', 'user']),
            $user
        )->get();
        return view('goods.index', compact('goods'));
    }


    public function indexs()
    {
        $user = Auth::user();
        $goods = ResourceAuthorizationService::filterByUserRole(
            Good::query()->with(['supplier', 'workflows', 'user']),
            $user
        )->get();
        return view('goods.indexs', compact('goods'));
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
            'item__description'=>'required',
            'quality'=>'required',
            'invoice_value'=>'required',
            'request_item'=>'required',
        ]);

        // ✅ Automatically set user_id to current authenticated user
        $data = $request->all();
        $data['user_id'] = Auth::id();

        $good = Good::create($data);

        // Initialize workflow - create first step
        $firstWorkflowStep = \App\Models\WorkflowStep::orderBy('step_order')->first();

        if ($firstWorkflowStep) {
            $good->workflows()->create([
                'user_id' => auth()->id(),
                'is_completed' => false,
                'approved_status' => null,
                'workflow_steps_id' => $firstWorkflowStep->id,
            ]);
        }

        return redirect()->route('goods.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Good $good)
    {
        $good->load(['supplier', 'workflows']);
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
                // 'request_date'=>'required',
                // 'request_by'=>'required',
                'invoice_number'=>'required',
                // 'verified_by'=> 'required',
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
          $good->delete();

        return redirect()->route('goods.index')
                         ->with('success', 'Item deleted successfully.');
    }

    /**
     * Approve the current workflow step, move to next step or complete workflow.
     */
    public function approveWorkflowStep(Good $good)
    {
        $currentStep = $good->workflows()->where('is_completed', false)->first();

        if ($currentStep) {
            $currentStep->update([
                'is_completed' => true,
                'approved_status' => true,
                'date_completed' => now(),
            ]);

            $nextStep = \App\Models\WorkflowStep::where('step_order', '>', $currentStep->workflow_steps->step_order)
                ->orderBy('step_order')
                ->first();

            if ($nextStep) {
                $good->workflows()->create([
                    'user_id' => auth()->id(),
                    'is_completed' => false,
                    'approved_status' => null,
                    'workflow_steps_id' => $nextStep->id,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Workflow step approved.');
    }

    /**
     * Reject current workflow step.
     */
    public function rejectWorkflowStep(Good $good)
    {
        $currentStep = $good->workflows()->where('is_completed', false)->first();

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
