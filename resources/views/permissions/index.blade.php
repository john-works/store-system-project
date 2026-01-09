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
                    <h3>Permissions Management</h3>
                    <p class="text-subtitle text-muted">
                        Manage user permissions per resource
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Permissions
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">User Permissions</h4>
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">
                        Grant Permissions
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="permissionsTable">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Resource</th>
                                <th>Allowed Actions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($permissions as $userId => $userPermissions)
                                @php
                                    $permission = $userPermissions->first(); // get the first permission
                                    $user = $permission?->user;             // safely get the user
                                @endphp

                                @foreach($userPermissions->groupBy('resource') as $resource => $perms)
                                    <tr>
                                        <td>{{ $user?->name ?? 'Unknown User' }}</td>
                                        <td>{{ ucfirst($resource) }}</td>
                                        <td>
                                            <span class="badge bg-info">
                                                {{ $perms->pluck('action')->implode(', ') }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('permissions.edit', $userId) }}" 
                                               class="btn btn-sm btn-warning me-1">
                                                Edit
                                            </a>

                                            <form action="{{ route('permissions.destroy', $userId) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Remove all permissions for this user?')">
                                                    Remove All
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        No permissions found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

{{-- DataTables Script --}}
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tableEl = document.querySelector('#permissionsTable');
        if (tableEl && !tableEl.__datatable) {
            tableEl.__datatable = true;
            new simpleDatatables.DataTable(tableEl);
        }
    });
</script>

@endsection
