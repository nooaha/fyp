@extends('layouts.user_type.auth')

@section('content')

    <style>
        /* Fix the width of the action column */
        .action-column {
            width: 150px;
            text-align: center;
        }

        /* Add button aligned right */
        .btn-add {
            float: right;
        }

        /* Align the title and button on the same row */
        .header-row {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Position "Tambah" button to the right */
        .header-row .btn-add {
            position: absolute;
            right: 0;
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
                <a href="#" class="btn btn-success btn-add btn-sm">Tambah</a>
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
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tip 1</td>
                                <td>This is a short description of tip 1.</td>
                                <td class="action-column">
                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Padam</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tip 2</td>
                                <td>This is a short description of tip 2.</td>
                                <td class="action-column">
                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Padam</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tip 3</td>
                                <td>This is a short description of tip 3.</td>
                                <td class="action-column">
                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Padam</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
@endsection
