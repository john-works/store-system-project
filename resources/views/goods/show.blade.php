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
                        <h3>Good Details</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('goods.index') }}">Goods</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $good->supplier_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Good Details Section -->
            <section id="good-details">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Good Information</h4>
                                <div>
                                    <a href="{{ route('goods.edit', $good->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('goods.destroy', $good->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this good?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12"><p><strong>Supplier Name:</strong> {{ $good->supplier_name }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Request Date:</strong> {{ \Carbon\Carbon::parse($good->request_date)->format('M d, Y') }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Requested By:</strong> {{ $good->request_by }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Verified By:</strong> {{ $good->verified_by }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Invoice Number:</strong> {{ $good->invoice_number }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Item Description:</strong> {{ $good->item__description }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Quantity:</strong> {{ $good->quality }}</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="{{ route('goods.index') }}" class="btn btn-secondary">Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Good Details Section -->
        </div>
    
@endsection
