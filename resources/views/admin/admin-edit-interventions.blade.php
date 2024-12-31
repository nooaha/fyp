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
                            <h5 class="mb-0">Edit Tajuk:
                                <strong class="text-capitalize"
                                    style="color: #3F51B2;">{{ $interventions->interventions_title }}</strong>
                            </h5>
                            <br>
                        </div>

                        <form action="{{ route('interventions.update', $interventions->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="form-control-label">Tajuk</label>
                                <input class="form-control" name="interventions_title"
                                    value="{{ $interventions->interventions_title }}" type="text" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Penerangan</label>
                                <input class="form-control" name="interventions_explain"
                                    value="{{ $interventions->interventions_explain }}" type="text" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Rujukan</label>
                                <input class="form-control" name="interventions_reference"
                                    value="{{ $interventions->interventions_reference }}" type="text" required>
                            </div>

                            <div class="form-group">
                                <label for="current_image">Gambar:</label>
                                <div style="border: 1px dashed #ccc; padding: 10px; width: fit-content;">
                                    @if ($interventions->interventions_image)
                                        <img src="{{ asset($interventions->interventions_image) }}" alt="Existing Image"
                                            style="max-width: 300px; height: auto;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="interventions_image">Tukar Gambar:</label>
                                <input type="file" name="interventions_image" id="interventions_image"
                                    class="form-control">
                            </div>
                            <div class="d-flex mt-3 justify-content-end">
                                <!-- Back Button -->
                                <a href="{{ route('interventions.index') }}" class="btn btn-secondary me-2 btn-sm"
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
