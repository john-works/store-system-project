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
                                    <li class="breadcrumb-item active" aria-current="page">Movement</li>
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
                                    <h4 class="card-title">Add New Movement Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                      <form action="{{ route('moverments.store') }}" method="POST" class="form">
                                    @csrf


                                            <div class="row">


                                                  <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                         <label for="item_id" class="form-label">Item Name</label>
                                                <select name="item_id" id="item_id" class="form-control" required>
                                        <option value="">Select item</option>
                                            @foreach($items as $item)
                                             <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                        @endforeach
                                            </select>
                                                    </div>
                                                </div>

                                     <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="from_department"> From Department</label>
                                                        <select type="text" id="from_department" class="form-control"
                                                             name="from_department" required>

                                                             <option>Selete Department</option>
                                                             <option>Hr</option>
                                                             <option>Finance</option>
                                                             <option>Planning</option>
                                                             

                                                        </select>
                                                    </div>
                                                </div>

                                              <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                         <label for="user_id" class="form-label">From User</label>
                                                <select name="user_id" id="user_id" class="form-control" required>
                                        <option value="">Select User</option>
                                            @foreach($users as $user)
                                             <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                            </select>
                                                    </div>
                                                </div>

                                                

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="to_department"> To Department</label>
                                                        <select type="text" id="to_department" class="form-control"
                                                             name="to_department" required>

                                                             <option>Selete Department</option>
                                                             <option>Hr</option>
                                                             <option> Finance</option>
                                                             <option> Planning</option>
                                                             

                                                        </select>
                                                    </div>
                                                </div>
                 
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                         <label for="supplier_id" class="form-label">To User</label>
                                                <select name="supplier_id" id="supplier_id" class="form-control" required>
                                        <option value="">Select User</option>
                                            @foreach($users as $user)
                                             <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                            </select>
                                                    </div>
                                                </div>

                                               


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

