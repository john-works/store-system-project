@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Grant Permissions</h1>
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
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
                    <input class="form-check-input" type="checkbox" name="actions[]" value="{{ $action }}" id="{{ $action }}">
                    <label class="form-check-label" for="{{ $action }}">
                        {{ ucfirst($action) }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Grant Permissions</button>
    </form>
</div>
@endsection
