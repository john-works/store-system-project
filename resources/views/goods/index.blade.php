
@extends('layouts.public')

@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
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
                            <h3>DataTable</h3>
                            <p class="text-subtitle text-muted">For user to check they list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
				
				
				
				
				
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Simple Datatable
                        </div>

                        <div class="card-footer text-end">
                                <a href="{{ route('goods.create') }}" class="btn btn-secondary">Add New Good  Detail</a>
                            </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Supplier Name</th>
                                        <th>Request Date</th>
                                        <th>Verified By</th>
                                        <th>Item Description</th>
                                        <th>Request By</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                          @forelse($goods as $good)
                                <tr>
                                   <td>{{ $good->id }}</td>
                                    <td>{{ $good->supplier->supplier_name }}</td>
                                    <td>{{ $good->request_date }}</td>
                                    <td>{{ $good->invoice_description }}</td>
                                    <td>{{ $good->item__description }}</td>
                                    <td>{{ $good->request_by }}</td>
                                    
                                    <td>
                                        {{-- <a href="{{ route('goods.show', $good->id) }}" class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('goods.edit', $good->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('goods.destroy', $good->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this supplier?')">
                                                Delete
                                            </button>
                                        </form> --}}  <span class="action-icon" data-id="{{ $good->id }}">📄</span>
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

<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

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
    function handleAction(action) {
        let id = currentIcon?.getAttribute("data-id");
        if (!id) return;

        if (action === "view") {
            window.location.href = `/goods/${id}`;
        } else if (action === "edit") {
            window.location.href = `/goods/${id}/edit`;
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
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>