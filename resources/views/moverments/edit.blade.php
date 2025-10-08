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
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Invoices</li>
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
                                    <h4 class="card-title">Add New Invoice Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                       <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')    
                                    



                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="supplier_name">Supplier Name</label>
                                                        <input type="text" id="supplier_name" class="form-control"
                                                          value="{{ old('supplier_name', $invoice->supplier_name) }}"    name="supplier_name" required>
                                                    </div>
                                                </div>


                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="received_date">Received Date</label>
                                                        <input type="date" id="received_date" class="form-control"
                                                           value="{{ old('received_date', $invoice->received_date) }}"   name="received_date" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="invoice_number">Invoice Number</label>
                                                        <input type="number" id="invoice_number" class="form-control"
                                                           value="{{ old('invoice_number', $invoice->invoice_number) }}"  name="invoice_number" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="invoice_description">Invoice Description</label>
                                                        <input type="text" id="invoice_description" class="form-control"
                                                           value="{{ old('invoice_description', $invoice->invoice_description) }}"  name="invoice_description" required>
                                                    </div>
                                                </div>
        

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="invoice_date">Invoice Date</label>
                                                        <input type="date" id="invoice_date" class="form-control"
                                                          value="{{ old('invoice_date', $invoice->invoice_date) }}"   name="invoice_date" prequired>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="received_amount">Received Amount</label>
                                                        <input type="number" id="received_amount" class="form-control"
                                                          value="{{ old('received_amount', $invoice->received_amount) }}"   name="received_amount" required>
                                                    </div>
                                                </div>
                 
                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="invoice_currency">Invoice Currency</label>
                                                        <input type="number" id="invoice_currency" class="form-control"
                                                           value="{{ old('invoice_currency', $invoice->invoice_currency) }}"  name="invoice_currency" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="invoice_date">Invoice Date</label>
                                                        <input type="date" id="invoice_date" class="form-control"
                                                          value="{{ old('invoice_date', $invoice->invoice_date) }}"   name="invoice_date" required>
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

