@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Delete Confirmation</h2>

    <p>Are you sure you want to delete this Moverment?</p>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>ID:</strong> {{ $item->id }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $item->item_name }}</li>
        <li class="list-group-item"><strong>Description:</strong> {{ $item->description }}</li>
    </ul>

    <form action="{{ route('moverments.destroy', $moverment->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('moverments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
