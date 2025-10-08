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
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                                    <h4 class="card-title">Add New User Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                      <form action="{{ route('users.store') }}" method="POST" class="form">
                                    @csrf



                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="name">User Name</label>
                                                        <input type="text" id="name" class="form-control"
                                                             name="name" required>
                                                    </div>
                                                    </div>
                                                
                                          

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" id="phone" class="form-control"
                                                             name="phone" required>
                                                    </div>
                                                </div>



                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email"> Email</label>
                                                        <input type="email" id="email" class="form-control"
                                                             name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="text" id="password" class="form-control"
                                                            name="password" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <input type="text" id="role" class="form-control"
                                                            name="role" required>
                                                    </div>
                                                </div>
        

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="department"> Department</label>
                                                        <select type="text" id="department" class="form-control"
                                                            name="department" required>

                                                            <option> Select Department</option>
                                                            <option>Finance</option>
                                                            <option>Stores</option>
                                                            <option>Planning</option>
                                                            <option>Hr</option>



                                                        </select>
                                                    </div>
                                                </div>
                                                

                                            
                                                <div class="form-group col-12">
                                                   
                                               
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
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

