@extends('layouts.app')

@section('content')


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
                    <h3>Grant Permissions</h3>
                    <p class="text-subtitle text-muted">
                        Assign permissions to users per resource
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Grant</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

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
