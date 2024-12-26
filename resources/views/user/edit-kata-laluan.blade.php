@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-5">
    <div class="card-header pb-0">
        <div class="col-md-9">
            <h6 class="mb-0">Edit Kata Laluan</h6>
        </div>
    <div class="card-body pt-4 p-3">
        <form action="{{ route('update-password') }}" method="POST" role="form text-left">
            @csrf
            <!-- Form fields for Password Update -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="current-password"
                            class="form-control-label">{{ __('Kata Laluan Sekarang') }}</label>
                        <input class="form-control" type="password"
                            placeholder="Masukkan Kata Laluan Sekarang" id="current-password"
                            name="current_password">
                        @error('current_password')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="new-password"
                            class="form-control-label">{{ __('Kata Laluan Baru') }}</label>
                        <input class="form-control" type="password"
                            placeholder="Masukkan Kata Laluan Baru" id="new-password"
                            name="new_password">
                        @error('new_password')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="confirm-password"
                            class="form-control-label">{{ __('Sahkan Kata Laluan') }}</label>
                        <input class="form-control" type="password"
                            placeholder="Sahkan Kata Laluan Baru" id="confirm-password"
                            name="new_password_confirmation">
                        @error('new_password_confirmation')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <!-- Button Kembali (Left) -->
                    <button type="button" class="btn btn-secondary btn-sm"
                        onclick="window.location.href='/papar-maklumat'">Kembali</button>
                    </button>
                </div>
                <div class="col-6 text-end">
                    <!-- Button Kemaskini Kata Laluan (Right) -->
                    <button type="submit" class="btn btn-primary btn-sm">
                        {{ __('Kemaskini') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
