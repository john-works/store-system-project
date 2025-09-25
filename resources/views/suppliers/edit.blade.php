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
                                    <h4 class="card-title">Add New Supplier Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                       <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
                                    
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="supplier_name">Supplier Name</label>
                                                        <input type="text" id="supplier_name" class="form-control"
                                                             name="supplier_name" required   value="{{ old('supplier_name', $supplier->supplier_name) }}" >
                                                    </div>
                                                </div>


                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" class="form-control"
                                                         value="{{ old('email', $supplier->email) }}"     name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" id="phone" class="form-control"
                                                           value="{{ old('phone', $supplier->phone) }}"  name="phone" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" id="address" class="form-control"
                                                            name="address" required value="{{ old('address', $supplier->address) }}" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tin">TIN</label>
                                                        <input type="number" id="tin" class="form-control"
                                                          value="{{ old('tin', $supplier->tin) }}"   name="tin" required>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="bank_account">Bank Account</label>
                                                        <input type="number" id="bank_account" class="form-control"
                                                           value="{{ old('bank_account', $supplier->bank_account) }}"  name="bank_account"  required>
                                                    </div>
                                                </div>

                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="type_of_good">Category Good/ Service</label>
                                                        <select type="number" id="type_of_good" class="form-control"
                                                          value="{{ old('type_of_good', $supplier->type_of_good) }}"   name="type_of_good" required>
                                                            <option>Electronic</option>
                                                            <option>Stationary</option>
                                                            <option>Raw Materials</option>

                                                        </select>
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

