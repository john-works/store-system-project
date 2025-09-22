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
                    <h3>Borrowing Details</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('borrowings.index') }}">Borrowings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $borrowing->item_name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Borrowing Details Card -->
        <section id="borrowing-details">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Borrowing Information</h4>
                            <div>
                                <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this borrowing?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <p><strong>Request Date:</strong> 
                                            {{ \Carbon\Carbon::parse($borrowing->request_date)->format('M d, Y') }}
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p><strong>Request By:</strong> {{ $borrowing->request_by }}</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p><strong>Request Summary:</strong> {{ $borrowing->request_summary }}</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p><strong>Item Name:</strong> {{ $borrowing->item_name }}</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p><strong>Asset Tag:</strong> {{ $borrowing->asset_tag }}</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p><strong>Comment:</strong> {{ $borrowing->comment }}</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p><strong>Status:</strong> {{ $borrowing->status }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Borrowing Details Card -->
    </div>

@endsection
