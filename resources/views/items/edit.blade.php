@extends('layouts.public')

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
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Items</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                
                


                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Items Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                       <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')    
        
        
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="item_name">Item Name</label>
                                                        <input type="text" id="item_name" class="form-control"
                                                           value="{{ old('item_name', $item->item_name) }}"   name="item_name" required>
                                                    </div>
                                                </div>

                                               <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                         <label for="supplier_id" class="form-label">Supplier</label>
                                                <select name="supplier_id" id="supplier_id" class="form-control" required>
                                        <option value="">Select Supplier</option>
                                            @foreach($suppliers as $supplier)
                                             <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                        @endforeach
                                            </select>
                                                    </div>
                                                </div>



                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="unit_of_measure"> Unit Of Measure</label>
                                                        <input type="text" id="unit_of_measure" class="form-control"
                                                           value="{{ old('unit_of_measure', $item->unit_of_measure) }}"   name="unit_of_measure" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="serier_number">Serier Number</label>
                                                        <input type="number" id="serier_number" class="form-control"
                                                           value="{{ old('serier_number', $item->serier_number) }}"  name="serier_number" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="asset_tag">Asset Tag</label>
                                                        <input type="text" id="asset_tag" class="form-control"
                                                         value="{{ old('asset_tag', $item->asset_tag) }}"    name="asset_tag" required>
                                                    </div>
                                                </div>
        

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="date_delivered">Delivered Date</label>
                                                        <input type="date" id="date_delivered" class="form-control"
                                                         value="{{ old('date_delivered', $item->date_delivered) }}"    name="date_delivered" prequired>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="expiry_date">Expiry Date</label>
                                                        <input type="date" id="expiry_date" class="form-control"
                                                        value="{{ old('expiry_date', $item->expiry_date) }}"     name="expiry_date" required>
                                                    </div>
                                                </div>
                 
                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="qty">Quantity</label>
                                                        <input type="number" id="qty" class="form-control"
                                                          value="{{ old('qty', $item->qty) }}"   name="qty" required>
                                                    </div>
                                                </div>




                                                <div class="form-group col-12">
                                                   
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>










                                     
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
            </div>

            
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>

