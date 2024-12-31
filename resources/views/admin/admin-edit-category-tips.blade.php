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
                <div class="card-header pb-0">
                    <div class="row mb-0">
                        <div class="col-md-9">
                            <h4 class="mb-0">Edit Kategori Umur:
                                <strong class="text-capitalize"
                                    style="color: #3F51B2;">{{ $tipscategory->age_category }}</strong>
                            </h4>
                            <br>
                        </div>

                        <form action="{{ route('tips-categories.update', $tipscategory->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="form-control-label">Kategori Umur (bulan)</label>
                                <input class="form-control" name="age_category" value="{{ $tipscategory->age_category }}"
                                    type="text" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Penerangan</label>
                                <input class="form-control" name="tipscategoryname" value="{{ $tipscategory->tips_name }}"
                                    type="text" required>
                            </div>

                            <div class="form-group">
                                <label for="current_image">Gambar:</label>
                                <div style="border: 1px dashed #ccc; padding: 10px; width: fit-content;">
                                    @if ($tipscategory->image)
                                        <img src="{{ asset($tipscategory->image) }}" alt="Existing Image"
                                            style="max-width: 300px; height: auto;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Tukar Gambar:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="d-flex mt-3 justify-content-end">
                                <!-- Back Button -->
                                <a href="{{ route('tips-categories.index') }}" class="btn btn-secondary me-2 btn-sm"
                                    id="cancelButton">Kembali</a>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-sm" style="float: right">Kemas kini
                                    Tips</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
