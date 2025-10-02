@extends('layouts.public')

@section('content')

<div id="app">
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
                        <!-- Left side title if needed -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Movement</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Show Movement Details -->
            <section id="movement-details">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Movement Details</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Item</th>
                                            <td>{{ $movement->item->item_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>From Department</th>
                                            <td>{{ $movement->from_department }}</td>
                                        </tr>
                                        <tr>
                                            <th>From User</th>
                                            <td>{{ $movement->fromUser->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>To Department</th>
                                            <td>{{ $movement->to_department }}</td>
                                        </tr>
                                        <tr>
                                            <th>To User</th>
                                            <td>{{ $movement->toUser->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Request Summary</th>
                                            <td>{{ $movement->request_summary }}</td>
                                        </tr>
                                        <tr>
                                            <th>Request Date</th>
                                            <td>{{ $movement->request_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Requested By</th>
                                            <td>{{ $movement->request_by }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('moverments.index') }}" class="btn btn-secondary">Back</a>
                                    <a href="{{ route('moverments.edit', $movement->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('moverments.destroy', $movement->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this movement?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

@endsection
