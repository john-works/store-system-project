@extends('layouts.public')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Item</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Delete Item</h3>
                            <p class="text-subtitle text-muted">Confirm deletion of this item.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Delete Item</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <h4>Delete Item Confirmation</h4>
                        </div>
                        <div class="card-body">
                            <p>Are you sure you want to delete the following item?</p>

                            <ul>
                                <li><strong>Item Name:</strong> {{ $item->item_name }}</li>
                                <li><strong>Supplier:</strong> {{ $item->supplier->supplier_name ?? 'N/A' }}</li>
                                <li><strong>Quantity:</strong> {{ $item->qty }}</li>
                                <li><strong>Serier Number:</strong> {{ $item->serier_number }}</li>
                                <li><strong>Asset Tag:</strong> {{ $item->asset_tag }}</li>
                            </ul>

                            <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

@endsection
