@extends('layouts.user_type.auth')
@section('content')

<style>
    .custom-btn {
        width: 130px; /* Adjust the width as needed */
    }
</style>

    <div class="container mt-5">
        <div class="card-header pb-0">
        <br>

        <div class="d-flex justify-content-center text-center">
            <button type="button" class="btn btn-primary btn-sm custom-btn" onclick="window.location.href='{{ route('tips-categories.store') }}'">Tips</button>
        </div>


        <div class="d-flex justify-content-center text-center">
            <button type="button" class="btn btn-primary btn-sm custom-btn" onclick="window.location.href='/admin-interventions'">Intervensi</button>
        </div>


        <!-- start button kembali-->
        <div class="d-flex justify-content-center text-center">
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.location.href='/admin-dashboard'">Kembali</button>
        </div>
        <!-- end button kembali-->
        <br>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
