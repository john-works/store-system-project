@extends('layouts.app')

@section('content')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3 class="text-danger">Delete Contract Confirmation</h3>
                    <p class="text-muted">Please confirm that you want to permanently delete this contract record.</p>
                </div>
                <div class="col-12 col-md-4 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('contracts.index') }}">Contracts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Delete Contract</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Card -->
        <section class="section">
            <div class="card border-danger shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0">Confirm Delete</h5>
                </div>
                <div class="card-body text-center">
                    <h4 class="text-dark mb-3">{{ $contract->procument_subject }}</h4>
                    <p>
                        <strong>Supplier:</strong> {{ $contract->supplier->supplier_name ?? 'N/A' }}<br>
                        <strong>Procurement Type:</strong> {{ $contract->procurement_type }}<br>
                        <strong>Amount:</strong> UGX {{ number_format($contract->amount_cost, 0) }}<br>
                        <strong>Contract Period:</strong> {{ $contract->start_date }} to {{ $contract->end_date }}
                    </p>

                    <hr>

                    <p class="text-danger fw-bold">⚠️ Are you sure you want to delete this contract? This action cannot be undone.</p>

                    <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger me-2">
                            <i class="bi bi-trash3"></i> Yes, Delete Permanently
                        </button>
                        <a href="{{ route('contracts.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle"></i> Cancel
                        </a>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
