
@extends('layouts.app')

@section('content')


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">

    <div id="app">
        


        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
        
            <div class="page-heading">
          
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Contracts Details
                        </div>
 <div class="card-footer text-end">
                                <a href="{{ route('contracts.create') }}" class="btn btn-secondary">Add New Borrowing Request</a>
                            </div>
                        
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Supplier Name</th>
                                        <th>Procurement Type</th>
                                        <th>Amount Cost</th>
                                        <th>Signing Date</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                         {{-- <th>Current Step Start</th> --}}
                                        <th>Workflow Status</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                               
                          @forelse($contracts as $contract)
                                <tr>

                                   <td>{{ $contract->supplier->supplier_name }}</td>
                                    <td>{{ $contract->procurement_type }}</td>
                                    <td>{{ $contract->amount_cost }}</td>
                                     <td>{{ $contract->signing_date }}</td>
                                    <td>{{ $contract->start_date }}</td>
                                    <td>{{ $contract->end_date }}</td>
                                    <td>{{ $contract->current_step_start }}</td>
                                    <td>
                                        @php
                                            $currentWorkflow = $contract->workflows->where('is_completed', false)->first();
                                        @endphp
                                        @if($currentWorkflow)
                                            Step: {{ $currentWorkflow->workflow_step->step_name }} <br/>
                                            Status:
                                            @if($currentWorkflow->approved_status === null)
                                                Pending
                                            @elseif($currentWorkflow->approved_status)
                                                Approved
                                            @else
                                                Rejected
                                            @endif
                                        @else
                                            Completed
                                        @endif
                                    </td>
                                    <td>
                                          <span class="action-icon" data-id="{{ $contract->id }}">📄</span>
                                          @if($currentWorkflow && $currentWorkflow->approved_status === null)
                                            <form method="POST" action="{{ route('contracts.approve', $contract->id) }}" style="display:inline;">
                                               @csrf
                                               <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                            <form method="POST" action="{{ route('contracts.reject', $contract->id) }}" style="display:inline;">
                                               @csrf
                                               <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                            </form>
                                          @endif
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
    function handleAction(action,url) {
        let id = currentIcon?.getAttribute("data-id");
        if (!id) return;

        if (action === "view") {
            window.location.href = `/contracts/${id}`;
        } else if (action === "edit") {
            window.location.href = `/contracts/${id}/edit`;
        } else if (action === "delete") {
            if (confirm("Are you sure you want to delete this user?")) {
                fetch(`/contracts/${id}`, {
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