@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h4>Delete Confirmation</h4>
                </div>
                <div class="card-body">
                    <p>Are you sure you want to delete this record?</p>

                    <ul>
                        <li><strong>ID:</strong> {{ $supplier->id }}</li>
                        <li><strong>Name:</strong> {{ $supplier->supplier_name }}</li>
                        {{-- <li><strong>Description:</strong> {{ $item->description }}</li> --}}
                    </ul>

                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('Supplier.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-danger">
                            Yes, Delete
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
