<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkflowStep;

class WorkflowstepController extends Controller
{
      public function index()
    {
        // $workflow_steps = WorkflowStep::all(); // fetch all suppliers
        return view('workflow_steps.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('workflow_steps.create');
    }

}
