@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Permissions for {{ $user->name }}</h1>
    <form action="{{ route('permissions.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="resource">Resource</label>
            <select name="resource" id="resource" class="form-control" required>
                <option value="">Select Resource</option>
                @foreach($resources as $resource)
                    <option value="{{ $resource }}">{{ ucfirst($resource) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Actions</label>
            @foreach($actions as $action)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="actions[]" value="{{ $action }}" id="{{ $action }}"
                        {{ $permissions->where('resource', request('resource', ''))->where('action', $action)->isNotEmpty() ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $action }}">
                        {{ ucfirst($action) }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Update Permissions</button>
    </form>
</div>
@endsection
