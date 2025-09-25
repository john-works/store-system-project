@extends('layouts.public')

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
                        <h3>Invoice Details</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Invoices</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Invoice</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Show Invoice -->
            <section id="view-invoice">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card shadow-lg border-0">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title">Invoice #{{ $invoice->invoice_number }}</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Supplier Name</th>
                                            <td>{{ $invoice->supplier->supplier_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Received Date</th>
                                            <td>{{ \Carbon\Carbon::parse($invoice->received_date)->format('d M, Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Invoice Number</th>
                                            <td>{{ $invoice->invoice_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ $invoice->invoice_description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Invoice Date</th>
                                            <td>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M, Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Received Amount</th>
                                            <td>{{ number_format($invoice->received_amount, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Currency</th>
                                            <td>{{ $invoice->invoice_currency }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="mt-4 d-flex justify-content-between">
                                    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Back
                                    </a>
                                    <div>
                                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this invoice?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Show Invoice -->
        </div>
    
@endsection
