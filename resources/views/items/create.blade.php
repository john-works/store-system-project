@extends('layouts.app')

@section('content')
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
                    <div class="col-12 col-md-6 order-md-1 order-last"></div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Items</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Start -->
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">Add New Items</h4>
                                <button type="button" class="btn btn-sm btn-success" id="addRow">+ Add Item</button>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('items.store') }}" method="POST" class="form">
                                        @csrf
                                        <div id="items-wrapper">
                                            <div class="item-row row border rounded p-3 mb-3">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Item Name</label>
                                                        <input type="text" class="form-control" name="items[0][item_name]" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Supplier</label>
                                                        <select name="items[0][supplier_id]" class="form-control" required>
                                                            <option value="">Select Supplier</option>
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Unit of Measure</label>
                                                        <select class="form-control" name="items[0][unit_of_measure]" required>
                                                            <option value="">Select Unit</option>
                                                            <option>Dozen</option>
                                                            <option>Pieces</option>
                                                            <option>Ream</option>
                                                            <option>Packets</option>
                                                            <option>Box</option>
                                                            <option>Lts</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Serial Number</label>
                                                        <input type="number" class="form-control" name="items[0][serier_number]" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Asset Tag</label>
                                                        <input type="number" class="form-control" name="items[0][asset_tag]" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Delivered Date</label>
                                                        <input type="date" class="form-control" name="items[0][date_delivered]" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Expiry Date</label>
                                                        <input type="date" class="form-control" name="items[0][expiry_date]" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input type="number" class="form-control" name="items[0][qty]" required>
                                                    </div>
                                                </div>

                                                <div class="col-12 text-end">
                                                    <button type="button" class="btn btn-danger btn-sm removeRow">Remove</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End -->
        </div>
    </div>
</div>

<script>
// Handle adding/removing rows
let rowIndex = 1;

document.getElementById('addRow').addEventListener('click', function () {
    let wrapper = document.getElementById('items-wrapper');
    let newRow = wrapper.firstElementChild.cloneNode(true);

    // Reset inputs
    newRow.querySelectorAll('input, select').forEach(el => {
        el.value = '';
        el.name = el.name.replace(/\d+/, rowIndex);
    });

    wrapper.appendChild(newRow);
    rowIndex++;
});

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('removeRow')) {
        if (document.querySelectorAll('.item-row').length > 1) {
            e.target.closest('.item-row').remove();
        }
    }
});
</script>
@endsection
