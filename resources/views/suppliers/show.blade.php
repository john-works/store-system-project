@extends('layouts.public')

@section('content')

   
     

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Supplier Details</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> --}}
                                <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $supplier->supplier_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Supplier Information Card -->
            <section id="supplier-details">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Supplier Information</h4>
                                <div>
                                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this supplier?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <p><strong>Supplier Name:</strong> {{ $supplier->supplier_name }}</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <p><strong>Email:&nbsp;</strong> {{ $supplier->email }}</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <p><strong>Phone:&nbsp;</strong> {{ $supplier->phone }}</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <p><strong>Address:&nbsp;</strong> {{ $supplier->address }}</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <p><strong>TIN:&nbsp;</strong> {{ $supplier->tin }}</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <p><strong>Bank Account:&nbsp;</strong> {{ $supplier->bank_account }}</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <p><strong>Category Good/Service:&nbsp;</strong> {{ $supplier->type_of_good }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Supplier Information Card -->
        </div>
    </div>
</div>
@endsection
