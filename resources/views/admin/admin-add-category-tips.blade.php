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
                                <h4 class="mb-0">Tambah Senarai Tips</h4>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <!-- Form to handle both the category and image upload -->
                        <form id="tipsForm" action="{{ route('tips-categories.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Tips Category -->

                            <div class="form-group">
                                <label for="age_category" class="form-control-label">Kategori Umur</label>
                                <input class="form-control" type="text" placeholder="Kategori umur" id="age_category"
                                    name="age_category" required>
                            </div>

                            <div class="form-group">
                                <label for="tips_name" class="form-control-label">Penerangan</label>
                                <input class="form-control" type="text" placeholder="Penerangan" id="tips_name"
                                    name="tips_name" required>
                            </div>

                            <!-- Image Upload Section -->
                            <div class="form-group">
                                <label for="image">Gambar:</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <!-- Buttons for form submission -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('tips-categories.index') }}"
                                    class="btn btn-secondary me-2 btn-sm">Batal</a>
                                <button type="submit" class="btn btn-primary btn-sm">+ Tambah Tips</button>
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
