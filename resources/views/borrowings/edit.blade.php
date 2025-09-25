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
                                    <li class="breadcrumb-item active" aria-current="page">Borrowings</li>
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
                                    <h4 class="card-title">Edit Borrowing Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                       <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
        @csrf
        @method('PUT')     
                                    




                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="request_date">Request Date</label>
                                                        <input type="date" id="request_date" class="form-control"
                                                            value="{{ old('request_date', $borrowing->request_date) }}"  name="request_date" required>
                                                    </div>
                                                </div>

                                          <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="request_by">Request By</label>
                                                        <input type="text" id="request_by" class="form-control"
                                                            value="{{ old('request_by', $borrowing->request_by) }}"  name="request_by" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="request_summary">Request Summary</label>
                                                        <input type="text" id="request_summary" class="form-control"
                                                            value="{{ old('request_summary', $borrowing->request_summary) }}" name="request_summary" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="item_name">Item Name</label>
                                                        <input type="text" id="item_name" class="form-control"
                                                           value="{{ old('item_name', $borrowing->item_name) }}"  name="item_name" required>
                                                    </div>
                                                </div>
        


      
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="asset_tag">Asset Tag</label>
                                                        <input type="text" id="asset_tag" class="form-control"
                                                           value="{{ old('asset_tag', $borrowing->asset_tag) }}"  name="asset_tag" prequired>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="comment">Comment</label>
                                                        <input type="text" id="comment" class="form-control"
                                                          value="{{ old('comment', $borrowing->comment) }}"   name="comment" required>
                                                    </div>
                                                </div>
                 
                                                 <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <input type="text" id="status" class="form-control"
                                                          value="{{ old('status', $borrowing->status) }}"   name="status" required>
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

