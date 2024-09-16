@extends('layouts.user_type.auth')

@section('content')

<div style="background-color: #90C9E9; padding: 10px; margin-top: 10px; text-align: center; border-radius: 20px;">
    <h5>Intervensi</h5>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-0">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row mb-0">
                        <div class="col-md-9">
                            <h6 class="mb-0">Tambah Senarai Kategori</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <!-- Form to handle both the category and image upload -->
                    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Tips Category -->
                        <div class="form-group">
                            <label for="tipsCategory" class="form-control-label">Nama Kategori</label>
                            <input class="form-control" type="text" placeholder="Nama kategori" id="tipsCategory" name="tips_category" required>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="form-group">
                            <label for="image">Gambar:</label>
                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>

                        <!-- Success Message placed below the image upload but above the buttons -->
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block mt-3">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <!-- Error Handling -->
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Buttons for form submission -->
                        <div class="d-flex justify-content-end mt-3">
                            <!-- Cancel/Back Button -->
                            <button type="button" class="btn btn-secondary me-2" onclick="window.history.back()">Kembali</button>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Tambah Senarai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.user_type.auth')

@section('content')

<div style="background-color: #90C9E9; padding: 10px; margin-top: 10px; text-align: center; border-radius: 20px;">
    <h5>Intervensi</h5>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-0">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row mb-0">
                        <div class="col-md-9">
                            <h6 class="mb-0">Tambah Senarai Kategori</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <!-- Form to handle both the category and image upload -->
                    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Tips Category -->
                        <div class="form-group">
                            <label for="tipsCategory" class="form-control-label">Nama Kategori</label>
                            <input class="form-control" type="text" placeholder="Nama kategori" id="tipsCategory" name="tips_category" required>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="form-group">
                            <label for="image">Gambar:</label>
                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>

                        <!-- Success Message placed below the image upload but above the buttons -->
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block mt-3">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <!-- Error Handling -->
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Buttons for form submission -->
                        <div class="d-flex justify-content-end mt-3">
                            <!-- Cancel/Back Button -->
                            <button type="button" class="btn btn-secondary me-2" onclick="window.history.back()">Kembali</button>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Tambah Senarai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
