{{-- resources/views/delete.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-red-600">Confirm Deletion</h2>

        <p class="mb-4">Are you sure you want to delete this record?</p>

        {{-- Optional: Display record details --}}
        <div class="mb-4 p-4 bg-gray-100 rounded">
            <p><strong>ID:</strong> {{ $supplier->id }}</p>
            <p><strong>Name:</strong> {{ $supplier->supplier_name }}</p>
            {{-- Add other fields as needed --}}
        </div>

        <form action="{{ route('suppliers.destroy', $record->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Delete
            </button>
            <a href="{{ route('suppliers.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                Cancel
            </a>
        </form>
    </div>
</div>
@endsection
