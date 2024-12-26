@extends('layouts.user_type.auth')

@section('content')
<div class="row my-4">
    <!-- first card-->
    <h2>Tambah Rekod Tumbesaran </h2>
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('growth-tracking.store' , ['childId' => request('childId')]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="height">Tinggi (cm)</label>
                        <input type="number" class="form-control" id="height" name="height" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="weight">Berat (kg)</label>
                        <input type="number" class="form-control" id="weight" name="weight" step="0.01" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('growth-tracking.showGrowthChart', ['childId' => request('childId')]) }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary" style="float: right">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection