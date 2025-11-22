<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkflowStep;

class WorkflowstepController extends Controller
{
      public function index()
    {
        // $workflow_step = WorkflowStep::all(); // fetch all suppliers
        return view('workflow_step.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('workflow_step.create');
    }

}
