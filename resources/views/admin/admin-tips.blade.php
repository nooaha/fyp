@extends('layouts.user_type.auth')

@section('content')
    <style>
        .id-column {
            width: 5%;
            /* Use a small percentage for the ID column */
            text-align: center;
        }

        .title-column {
            width: 70%;
            /* Give more space to the title column */
            text-align: left;
        }

        .action-column {
            width: 25%;
            /* Reduce width of action column */
            text-align: center;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-add {
            float: right;
        }
    </style>

    <div class="container mt-5">
        <br>
        <div class="card" style="width: 100%;">
            <div class="card-header pb-0">
                <br>
                <div class="header-row mb-3">
                    <h5 class="font-weight-bold">Kemaskini Senarai Kategori Tips</h5>
                    <button type="button" class="btn btn-success btn-sm btn-add"
                        onclick="window.location.href='{{ route('tips-categories.create') }}'">Tambah</button>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="id-column text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th
                                        class="title-column text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tajuk</th>
                                    <th
                                        class="action-column text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipscategories as $tipscategory)
                                    <tr>
                                        <td class="id-column">{{ $tipscategory->id }}</td>
                                        <td class="title-column">{{ $tipscategory->tipscategoryname }}</td>
                                        <td class="action-column">

                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                href="{{ route('tips-categories.destroy', $tipscategory->id) }}"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tipscategory->id }}').submit();">
                                                <i class="far fa-trash-alt me-2"></i>Padam
                                            </a>
                                            <form id="delete-form-{{ $tipscategory->id }}"
                                                action="{{ route('tips-categories.destroy', $tipscategory->id) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="{{ route('tips-categories.edit', $tipscategory->id) }}">
                                                <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Sunting
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center text-center">
                    <button type="button" class="btn btn-secondary btn-sm"
                        onclick="window.location.href='/admin-tips-interventions'">Kembali</button>
                </div>
            </div>
        </div>

        <!-- Include Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
@endsection
