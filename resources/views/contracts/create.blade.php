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
                                    <li class="breadcrumb-item active" aria-current="page">Contracts</li>
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
                                    <h4 class="card-title">Add New Contracts Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                      <form action="{{ route('contracts.store') }}" method="POST" class="form">
                                    @csrf


                       
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
                                                        <label for="procurement_type"> Procurement Type</label>
                                                        <select type="date" id="procurement_type" class="form-control"
                                                             name="procurement_type" required>
                                                             <option>Select one</option>
                                                             <option>Service</option>
                                                             <option>Good</option>



                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="amount_cost">Amount Cost</label>
                                                        <input type="number" id="amount_cost" class="form-control"
                                                            name="amount_cost" required>
                                                    </div>
                                                </div>
                                          <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="signing_date"> Contract Signing Date</label>
                                                        <input type="date" id="signing_date" class="form-control"
                                                            name="signing_date" required>
                                                    </div>
                                                </div>
        

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="start_date">Contract Start Date</label>
                                                        <input type="date" id="start_date" class="form-control"
                                                            name="start_date" prequired>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="received_amount">Received Amount</label>
                                                        <input type="number" id="received_amount" class="form-control"
                                                            name="received_amount" required>
                                                    </div>
                                                </div>
                 
                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="end_date">Contract End Date</label>
                                                        <input type="date" id="end_date" class="form-control"
                                                            name="end_date" required>
                                                    </div>
                                                </div>

       

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="procument_subject">Procument Subject</label>
                                                        <input type="text" id="procument_subject" class="form-control"
                                                            name="procument_subject" required>
                                                    </div>
                                                </div>

                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="termination_clauses">Termination Clauses</label>
                                                        <input type="text" id="termination_clauses" class="form-control"
                                                            name="termination_clauses" required>
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

