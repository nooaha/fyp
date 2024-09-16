@extends('layouts.user_type.auth')

@section('content')

    <style>
        /* Fix the width of the action column */
        .action-column {
            width: 150px;
            text-align: center;
        }

        /* Align the title and button on the same row, with button to the right */
        .header-row {
            display: flex;
            justify-content: space-between; /* Push content to far ends */
            align-items: center;
        }

        /* Styling for the Tips header */
        .tips-header {
            background-color: #90C9E9;
            padding: 10px;
            margin-top: 10px;
            text-align: center;
            border-radius: 20px;
        }

        /* Custom table border styling */
        table, th, td {
            border: 1px solid grey !important; /* Ensures all borders are visible */
        }

        /* Ensure the button stays on the right side of the card */
        .btn-add {
            float: right;
        }

    </style>

    <div class="container mt-5">
        <div class="tips-header">
            <h5>Tips</h5>
        </div>
        <br>

        <div class="card-header pb-0">
            <br>
            <!-- Header row containing title and add button -->
            <div class="header-row mb-3">
                <h5 class="font-weight-bold">Senarai Kategori</h5>
                <!-- "Tambah" button aligned to the right -->
                <button type="button" class="btn btn-success btn-sm btn-add" onclick="window.location.href='/tambah-kategori-tips'">Tambah</button>
            </div>

            <!-- Table starts here -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th class="action-column">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="categoryTableBody">
                            <tr>
                                <td>1</td>
                                <td>Tip 1</td>
                                <td>This is a short description of tip 1.</td>
                                <td class="action-column">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(this)">Padam</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tip 2</td>
                                <td>This is a short description of tip 2.</td>
                                <td class="action-column">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(this)">Padam</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tip 3</td>
                                <td>This is a short description of tip 3.</td>
                                <td class="action-column">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(this)">Padam</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Start button kembali -->
            <div class="d-flex justify-content-center text-center">
                <button type="button" class="btn btn-secondary btn-sm" onclick="window.location.href='/admin-tips-interventions'">Kembali</button>
            </div>
            <!-- End button kembali -->

        </div>

        <!-- Include Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- JavaScript for delete confirmation -->
        <script>
            function confirmDelete(button) {
                if (confirm("Adakah anda pasti untuk padam?")) {
                    // Delete the row if confirmed
                    var row = button.closest('tr');
                    row.remove();
                }
            }
        </script>
    </div>
@endsection
