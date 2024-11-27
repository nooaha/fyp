@extends('layouts.user_type.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-0">

                <div class="card-header pb-0">
                    <div class="row mb-0">
                        <div class="col-md-9">
                            <h6 class="mb-0">Edit Kategori</h6>
                        </div>

                        <form action="{{ route('tips-categories.update', $tipscategory->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="tipscategoryname">Nama Kategori:</label>
                                <input type="text" name="tipscategoryname" id="tipscategoryname" class="form-control"
                                    value="{{ $tipscategory->tipscategoryname }}" required>
                            </div>

                            <div class="form-group">
                                <label for="current_image">Gambar:</label>
                                <div style="border: 1px dashed #ccc; padding: 10px; width: fit-content;">
                                    @if ($tipscategory->image)
                                        <img src="{{ asset('storage/' . $tipscategory->image) }}" alt="Existing Image"
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
                                <button type="submit" class="btn btn-primary me-2">Sunting</button>
                                <a href="{{ route('tips-categories.index') }}" class="btn btn-secondary">Batal</a>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
