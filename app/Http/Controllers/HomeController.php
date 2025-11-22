<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\service;
use App\Models\Good;
use App\Models\Contract;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         $suppliers = Supplier::count();
        $services = service::count();
        $goods = Good::count();
        $contracts = Contract::count();

        return view('home', compact('suppliers', 'services','goods', 'contracts'));
        // return view('home');
    }
}

// {{ $items }}
