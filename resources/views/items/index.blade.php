
@extends('layouts.app')

@section('content')

    <div class="page-heading">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    Item Details
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('items.create') }}" class="btn btn-secondary">Add New Item Details</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Item Name</th>
                                <th>Supplier Name</th>
                                <th>Serier Number</th>
                                <th>Asset Tag</th>
                                <th>Expiry Date</th>
                                <th>Quantity</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>

                            @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->supplier->supplier_name }}</td>
                                <td>{{ $item->serier_number }}</td>
                                <td>{{ $item->asset_tag }}</td>
                                <td>{{ $item->expiry_date }}</td>
                                <td>{{ $item->qty }}</td>

                                <td>
                                    <span class="action-icon" data-id="{{ $item->id }}">📄</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">No Good found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    
<!-- Popup Menu -->
<div class="popup-menu" id="popupMenu">
    <ul>
        <li onclick="handleAction('view')">👁 View</li>
        <li onclick="handleAction('edit')">✏️ Edit</li>
        <li onclick="handleAction('delete')">📜 Delete</li>
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

    .popup-menu ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .popup-menu ul li {
        padding: 6px 8px;
        cursor: pointer;
        border-bottom: 1px solid #eee;
    }

    .popup-menu ul li:last-child {
        border-bottom: none;
    }

    .popup-menu ul li:hover {
        background: #f5f5f5;
    }
</style>

<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    if (table1) {
        let dataTable = new simpleDatatables.DataTable(table1);
    }

    const popupMenu = document.getElementById("popupMenu");
    let currentIcon = null;

    // Show popup when clicking file icon
    document.querySelectorAll(".action-icon").forEach(icon => {
        icon.addEventListener("click", (event) => {
            event.stopPropagation();
            currentIcon = event.target;

            popupMenu.style.display = "block";

            const rect = currentIcon.getBoundingClientRect();
            const popupHeight = popupMenu.offsetHeight;
            const popupWidth = popupMenu.offsetWidth;

            const left = rect.right + window.scrollX - popupWidth;
            const top = rect.top + window.scrollY - popupHeight - 12;

            popupMenu.style.left = left + "px";
            popupMenu.style.top = top + "px";
        });
    });

    // Hide popup when clicking outside
    document.addEventListener("click", () => {
        popupMenu.style.display = "none";
    });

    // Action handler
    function handleAction(action,url) {
        let id = currentIcon?.getAttribute("data-id");
        if (!id) return;

        if (action === "view") {
            window.location.href = `/items/${id}`;
        } else if (action === "edit") {
            window.location.href = `/items/${id}/edit`;
        } else if (action === "delete") {
            if (confirm("Are you sure you want to delete this user?")) {
                fetch(`/items/${id}`, {
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
