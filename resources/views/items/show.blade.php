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
                        <h3>Item Details</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $item->item_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Item Details Card -->
            <section id="item-details">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Item Information</h4>
                                <div>
                                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12"><p><strong>Item Name:</strong> {{ $item->item_name }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Supplier Name:</strong> {{ $item->supplier_name }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Unit of Measure:</strong> {{ $item->unit_of_measure }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Serial Number:</strong> {{ $item->serier_number }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Asset Tag:</strong> {{ $item->asset_tag }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Delivered Date:</strong> {{ \Carbon\Carbon::parse($item->date_delivered)->format('M d, Y') }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Expiry Date:</strong> {{ \Carbon\Carbon::parse($item->expiry_date)->format('M d, Y') }}</p></div>
                                        <div class="col-md-6 col-12"><p><strong>Quantity:</strong> {{ $item->qty }}</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Item Details Card -->
        </div>
    </div>
</div>
@endsection
