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
                                    <li class="breadcrumb-item active" aria-current="page">Goods</li>
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
                                    <h4 class="card-title">Edit  Items Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                       <form action="{{ route('goods.update', $good->id) }}" method="POST">
        @csrf
        @method('PUT')    
                                    


                                            <div class="row">
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
                                                        <label for="request_date">Request Date</label>
                                                        <input type="date" id="request_date" class="form-control"
                                                           value="{{ old('request_date', $good->request_date) }}"   name="request_date" required>
                                               </div>
                                                  </div>

                                                  <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="request_by">Request By</label>
                                                        <input type="text" id="request_by" class="form-control"
                                                           value="{{ old('request_by', $good->request_by) }}"  name="request_by" required>
                                                    </div>
                                                </div>

                                               

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="verified_by">Verified By</label>
                                                        <input type="text" id="verified_by" class="form-control"
                                                           value="{{ old('verified_by', $good->verified_by) }}"  name="verified_by" required>
                                                    </div>
                                                </div>
        

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="invoice_number">Invoice Number</label>
                                                        <input type="number" id="invoice_number" class="form-control"
                                                          value="{{ old('invoice_number', $good->invoice_number) }}"   name="invoice_number" prequired>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="item__description">Item Description</label>
                                                        <input type="text" id="item__description" class="form-control"
                                                          value="{{ old('item__description', $good->item__description) }}"   name="item__description" required>
                                                    </div>
                                                </div>
                 
                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="quality">Quantity</label>
                                                        <input type="number" id="invoice_currency" class="form-control"
                                                           value="{{ old('quality', $good->quality) }}"  name="quality" required>
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

