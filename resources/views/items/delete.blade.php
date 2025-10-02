@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Delete Confirmation</h2>

    <p>Are you sure you want to delete this item?</p>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>ID:</strong> {{ $item->id }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $item->item_name }}</li>
        <li class="list-group-item"><strong>Description:</strong> {{ $item->supplier->supplier_name }}</li>
      <li class="list-group-item"><strong>ID:</strong> {{ $item->unit_of_measure }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $item->serier_number }}</li>
        <li class="list-group-item"><strong>Description:</strong> {{ $item->asset_tag }}</li>
         <li class="list-group-item"><strong>ID:</strong> {{ $item->date_delivered }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $item->expiry_date }}</li>
        <li class="list-group-item"><strong>Description:</strong> {{ $item->qty }}</li>
      


    </ul>

    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
