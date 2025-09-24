@extends('layouts.app')

@section('content')

        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Contract Details</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('contracts.index') }}">Contracts</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $contract->supplier_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Contract Details Section -->
            <section id="contract-details">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Contract Information</h4>
                                <div>
                                    <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this contract?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6"><p><strong>Supplier Name:</strong> {{ $contract->supplier->supplier_name }}</p></div>
                                    <div class="col-md-6"><p><strong>Procurement Type:</strong> {{ $contract->procurement_type }}</p></div>
                                    <div class="col-md-6"><p><strong>Amount Cost:</strong> {{ number_format($contract->amount_cost, 2) }}</p></div>
                                    <div class="col-md-6"><p><strong>Signing Date:</strong> {{ \Carbon\Carbon::parse($contract->signing_date)->format('M d, Y') }}</p></div>
                                    <div class="col-md-6"><p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($contract->start_date)->format('M d, Y') }}</p></div>
                                    <div class="col-md-6"><p><strong>End Date:</strong> {{ \Carbon\Carbon::parse($contract->end_date)->format('M d, Y') }}</p></div>
                                    <div class="col-md-6"><p><strong>Received Amount:</strong> {{ number_format($contract->received_amount, 2) }}</p></div>
                                    <div class="col-md-6"><p><strong>Procurement Subject:</strong> {{ $contract->procument_subject }}</p></div>
                                    <div class="col-md-12"><p><strong>Termination Clauses:</strong> {{ $contract->termination_clauses }}</p></div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contract Details Section -->
        </div>
 
@endsection
