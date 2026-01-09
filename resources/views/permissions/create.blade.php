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

        <!-- Grant Permissions Form -->
        <section id="grant-permissions-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Grant User Permissions</h4>
                        </div>

                        <div class="card-content">
                            <div class="card-body">

                                <form action="{{ route('permissions.store') }}" method="POST" class="form">
                                    @csrf

                                    <div class="row">

                                        <!-- User Selection -->
                                        <div class="col-md-6 col-12 mb-3">
                                            <label for="user_id" class="form-label">User</label>
                                            <select name="user_id" id="user_id" class="form-select" required>
                                                <option value="">Select User</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Resource Selection -->
                                        <div class="col-md-6 col-12 mb-3">
                                            <label for="resource" class="form-label">Resource</label>
                                            <select name="resource" id="resource" class="form-select" required>
                                                <option value="">Select Resource</option>
                                                @foreach($resources as $resource)
                                                    <option value="{{ $resource }}">
                                                        {{ ucfirst($resource) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Actions Checkboxes -->
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Allowed Actions</label>
                                            <div class="row">
                                                @foreach($actions as $action)
                                                    <div class="col-md-3 col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="actions[]" value="{{ $action }}"
                                                                id="action_{{ $action }}">
                                                            <label class="form-check-label" for="action_{{ $action }}">
                                                                {{ ucfirst($action) }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-primary me-2">Grant Permissions</button>
                                            <button type="reset" class="btn btn-light-secondary">Reset</button>
                                        </div>

                                    </div>
                                </form>

                                @if ($errors->any())
                                    <div class="mt-3">
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(session('success'))
                                    <div class="mt-3 alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Form -->

    </div>
</div>

@endsection
