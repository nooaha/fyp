@extends('layouts.user_type.auth')
@section('content')

<div class="container mt-5">
    <div class="card-header pb-0">
        <br>

        <!-- Button to redirect to 'Tips' page -->
        <div class="d-flex justify-content-center text-center">
            <button type="button"
                    class="btn btn-primary btn-sm"
                    style="width: 130px;"
                    onclick="window.location.href='{{ route('tips-categories.index') }}'">
                Tips
            </button>
        </div>

        <!-- Button to redirect to 'Interventions' page -->
        <div class="d-flex justify-content-center text-center">
            <button type="button"
                    class="btn btn-primary btn-sm"
                    style="width: 130px;"
                    onclick="window.location.href='{{ route('interventions.index') }}'">
                Intervensi
            </button>
        </div>

        <!-- Button to redirect back to admin dashboard -->
        <div class="d-flex justify-content-center text-center">
            <button type="button"
                    class="btn btn-secondary btn-sm"
                    style="width: 130px;"
                    onclick="window.location.href='/admin-dashboard'">
                Kembali
            </button>
        </div>

        <br>
    </div>
</div>

@endsection
