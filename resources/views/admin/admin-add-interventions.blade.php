@extends('layouts.user_type.auth')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-0">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row mb-0">
                            <div class="col-md-9">
                                <h4 class="mb-0">Tambah Senarai Intervensi</h4>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <!-- Form to handle both the category and image upload -->
                        <form id="tipsForm" action="{{ route('interventions.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Tips Category -->

                            <div class="form-group">
                                <label for="interventions_title" class="form-control-label">Tajuk</label>
                                <input class="form-control" type="text" placeholder="Tajuk" id="interventions_title"
                                    name="interventions_title" required>
                            </div>

                            <div class="form-group">
                                <label for="interventions_explain" class="form-control-label">Penerangan</label>
                                <input class="form-control" type="text" placeholder="Penerangan"
                                    id="interventions_explain" name="interventions_explain" required>
                            </div>

                            <div class="form-group">
                                <label for="interventions_reference" class="form-control-label">Rujukan</label>
                                <input class="form-control" type="url" placeholder="https://example.com"
                                       id="interventions_reference" name="interventions_reference" required>
                            </div>

                            <!-- Image Upload Section -->
                            <div class="form-group">
                                <label for="interventions_image">Gambar:</label>
                                <input type="file" name="interventions_image" class="form-control"
                                    id="interventions_image">
                            </div>

                            <!-- Buttons for form submission -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('interventions.index') }}" class="btn btn-secondary me-2 btn-sm">Batal</a>
                                <button type="submit" class="btn btn-primary btn-sm">+ Tambah Intervensi</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
