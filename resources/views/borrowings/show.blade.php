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
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('borrowings.index') }}">Borrowings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Borrowing details card -->
            <section id="borrowing-details">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title">Borrowing Information</h4>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Item Name</dt>
                                    <dd class="col-sm-8">{{ $borrowing->item->item_name ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Asset Tag</dt>
                                    <dd class="col-sm-8">{{ $borrowing->item->asset_tag ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Serial Number</dt>
                                    <dd class="col-sm-8">{{ $borrowing->item->serier_number ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Request Summary</dt>
                                    <dd class="col-sm-8">{{ $borrowing->request_summary ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Request Date</dt>
                                    <dd class="col-sm-8">{{ $borrowing->request_date ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Requested By</dt>
                                    <dd class="col-sm-8">{{ $borrowing->request_by ?? 'N/A' }}</dd>
                                </dl>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('borrowings.index') }}" class="btn btn-secondary me-2">Back</a>
                                    <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
