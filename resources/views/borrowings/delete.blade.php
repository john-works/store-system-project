@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Delete Confirmation</h2>

    <p>Are you sure you want to delete this item?</p>

    <ul class="list-group mb-3">
        <li class="list-group-borrowing"><strong>ID:</strong> {{ $borrowing->id }}</li>
        <li class="list-group-borrowing"><strong>Name:</strong> {{ $borrowing->request_date }}</li>
        <li class="list-group-borrowing"><strong>Description:</strong> {{ $borrowing->request_by->supplier_name }}</li>
      <li class="list-group-borrowing"><strong>ID:</strong> {{ $borrowing->request_summary }}</li>
        <li class="list-group-borrowing"><strong>Name:</strong> {{ $borrowing->item_name }}</li>
        <li class="list-group-borrowing"><strong>Description:</strong> {{ $borrowing->asset_tag }}</li>
          <li class="list-group-borrowing"><strong>ID:</strong> {{ $borrowing->serier_number }}</li>
        {{--<li class="list-group-item"><strong>Name:</strong> {{ $item->expiry_date }}</li>
        <li class="list-group-item"><strong>Description:</strong> {{ $item->qty }}</li> --}}
      


    </ul>

    <form action="{{ route('borrowings.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
