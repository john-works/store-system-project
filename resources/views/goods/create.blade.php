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
                                    <li class="breadcrumb-item active" aria-current="page">Supplier</li>
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
                                    <h4 class="card-title">Add New Good Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                      <form action="{{ route('goods.store') }}" method="POST" class="form">
                                    @csrf


                                            <div class="row">



                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="request_item">Request Item</label>
                                                        <input type="text" id="request_item" class="form-control"
                                                             name="request_item" required>
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


                                                {{-- <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="request_date">Request Date</label>
                                                        <input type="date" id="request_date" class="form-control"
                                                             name="request_date" required>
                                                    </div>
                                                </div> --}}

                                                 {{-- <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="request_by">Request By</label>
                                                        <input type="text" id="request_by" class="form-control"
                                                             name="request_by" required>
                                                    </div>
                                                </div>  --}}

                                               
                                                {{-- <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="verified_by">Verified By</label>
                                                        <input type="text" id="verified_by" class="form-control"
                                                            name="verified_by" required>
                                                    </div>
                                                </div> --}}
        

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="invoice_number">Invoice Number</label>
                                                        <input type="number" id="invoice_number" class="form-control"
                                                            name="invoice_number" prequired>
                                                    </div>
                                                </div>


                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="invoice_value">Invoice Value</label>
                                                        <input type="number" id="invoice_value" class="form-control"
                                                             name="invoice_value" required>
                                                    </div>
                                                </div>

                                                

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="item__description">Item_ Description</label>
                                                        <input type="text" id="item__description" class="form-control"
                                                            name="item__description" required>
                                                    </div>
                                                </div>
                 
                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="quantiy">Quantity</label>
                                                        <input type="number" id="quality" class="form-control"
                                                            name="quality" required>
                                                    </div>
                                                </div>



  <!-- Hidden defaults -->
                                            <input type="hidden" name="request_summary" value="Summary of item needed">
                                            <input type="hidden" name="request_date" value="{{ now()->toDateString() }}">
                                            <input type="hidden" name="request_by" value="{{ auth()->user()->email }}">




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

