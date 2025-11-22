@extends('layouts.public')

@section('content')

        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>User Details</h3>
                        <p class="text-subtitle text-muted">View user information</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Show User Section -->
            <section id="user-details">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">User Profile</h4>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-arrow-left"></i> Back
                                </a>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-3">Name:</dt>
                                    <dd class="col-sm-9">{{ $user->name }}</dd>

                                    <dt class="col-sm-3">Phone:</dt>
                                    <dd class="col-sm-9">{{ $user->phone }}</dd>

                                    <dt class="col-sm-3">Email:</dt>
                                    <dd class="col-sm-9">{{ $user->email }}</dd>

                                    <dt class="col-sm-3">Role:</dt>
                                    <dd class="col-sm-9">{{ $user->role }}</dd>

                                    <dt class="col-sm-3">Department:</dt>
                                    <dd class="col-sm-9">{{ $user->department }}</dd>

                                    <dt class="col-sm-3">Password:</dt>
                                    <dd class="col-sm-9">{{ $user->password }}</dd>

                                    <dt class="col-sm-3">Created At:</dt>
                                    <dd class="col-sm-9">{{ $user->created_at->format('d M, Y H:i') }}</dd>

                                    <dt class="col-sm-3">Updated At:</dt>
                                    <dd class="col-sm-9">{{ $user->updated_at->format('d M, Y H:i') }}</dd>
                                </dl>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-2">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Show User Section -->

        </div>
    </div>
</div>
@endsection
