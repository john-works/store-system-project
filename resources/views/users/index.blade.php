@extends('layouts.public')

@section('content')


    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    User Information
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('users.create') }}" class="btn btn-secondary">Add New User</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->department }}</td>
                                <td>
                                    <span class="action-icon" data-id="{{ $user->id }}">📄</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Info found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Popup Menu -->
<div class="popup-menu" id="popupMenu">
    <ul>
        <li onclick="handleAction('view')">👁 View</li>
        <li onclick="handleAction('edit')">✏️ Edit</li>
        <li onclick="handleAction('delete')">🗑 Delete</li>
        <li onclick="handleAction('history')">📜 History</li>
    </ul>
</div>

<style>
    .action-icon {
        cursor: pointer;
        font-size: 18px;
        color: #007bff;
    }
    .popup-menu {
        display: none;
        position: absolute;
        background: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        border-radius: 5px;
        z-index: 1000;
        min-width: 110px;
        font-size: 13px;
    }
    .popup-menu ul { list-style: none; margin: 0; padding: 0; }
    .popup-menu ul li { padding: 6px 8px; cursor: pointer; border-bottom: 1px solid #eee; }
    .popup-menu ul li:last-child { border-bottom: none; }
    .popup-menu ul li:hover { background: #f5f5f5; }
</style>

<script>
    const popupMenu = document.getElementById("popupMenu");
    let currentIcon = null;

    document.querySelectorAll(".action-icon").forEach(icon => {
        icon.addEventListener("click", (event) => {
            event.stopPropagation();
            currentIcon = event.target;

            popupMenu.style.display = "block"; // show before measuring
            const rect = currentIcon.getBoundingClientRect();

            const left = rect.left + window.scrollX;
            const top = rect.bottom + window.scrollY + 5;

            popupMenu.style.left = left + "px";
            popupMenu.style.top = top + "px";
        });
    });

    // Hide popup on outside click
    document.addEventListener("click", () => {
        popupMenu.style.display = "none";
    });

    function handleAction(action) {
        let id = currentIcon?.getAttribute("data-id");
        if (!id) return;

        if (action === "view") {
            window.location.href = `/users/${id}`;
        } else if (action === "edit") {
            window.location.href = `/users/${id}/edit`;
        } else if (action === "delete") {
            if (confirm("Are you sure you want to delete this user?")) {
                fetch(`/users/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    }
                }).then(() => window.location.reload());
            }
        } else if (action === "history") {
            alert("History for user ID: " + id);
        }

        popupMenu.style.display = "none";
    }
</script>

@endsection
