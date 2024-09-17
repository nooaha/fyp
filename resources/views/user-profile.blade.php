@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid">
    <!--gambar atas -->
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <!--<span class="mask bg-gradient-primary opacity-6"></span>-->
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/team-1.jpg" alt="..." class="w-100 border-radius-lg shadow-sm">

                    <!-- untuk edit image profil
                        <a href="javascript:;" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                        <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                    </a>-->

                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->name }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{ __('Admin') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-tabs justify-content-center" id="admin-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active tab-item" data-bs-toggle="tab" href="#admin-info" role="tab" aria-controls="admin-info" aria-selected="true">
                                {{ __('Maklumat Admin') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tab-item" data-bs-toggle="tab" href="#password-info" role="tab" aria-controls="password-info" aria-selected="false">
                                {{ __('Tukar Kata Laluan') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Maklumat admin Content Section -->
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <!-- Admin Info Tab -->
                    <div class="tab-pane fade show active" id="admin-info" role="tabpanel">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">{{ __('Maklumat Admin') }}</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <form action="/user-profile" method="POST" role="form text-left">
                                @csrf
                                <!-- Form fields for Admin Info -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="user-name" class="form-control-label">{{ __('Nama Penuh') }}</label>
                                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                                <input class="form-control" value="{{ auth()->user()->name }}" type="text" placeholder="Name" id="user-name" name="name">
                                                @error('name')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user.tlahir" class="form-control-label">{{ __('Tarikh Lahir') }}</label>
                                            <div class="@error('user.tlahir')border border-danger rounded-3 @enderror">
                                                <input class="form-control" type="date" placeholder="40770888444" id="date" name="tlahir" value="{{ auth()->user()->tlahir }}">
                                                @error('Tarikh Lahir')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user.jantina" class="form-control-label">{{ __('Jantina') }}</label>
                                            <div class="@error('user.jantina') border border-danger rounded-3 @enderror">
                                                <input class="form-control" type="text" placeholder="Jantina" id="jantina" name="jantina" value="{{ auth()->user()->jantina }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="window.location.href='/admin-dashboard'">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>

                     <!-- Password Info Tab -->
                     <div class="tab-pane fade" id="password-info" role="tabpanel">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">{{ __('Tukar Kata Laluan') }}</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <form action="/update-password" method="POST" role="form text-left">
                                @csrf
                                <!-- Form fields for Password Update -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="current-password" class="form-control-label">{{ __('Kata Laluan Sekarang') }}</label>
                                            <input class="form-control" type="password" placeholder="Masukkan Kata Laluan Sekarang" id="current-password" name="current_password">
                                            @error('current_password')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="new-password" class="form-control-label">{{ __('Kata Laluan Baru') }}</label>
                                            <input class="form-control" type="password" placeholder="Masukkan Kata Laluan Baru" id="new-password" name="new_password">
                                            @error('new_password')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="confirm-password" class="form-control-label">{{ __('Sahkan Kata Laluan') }}</label>
                                            <input class="form-control" type="password" placeholder="Sahkan Kata Laluan Baru" id="confirm-password" name="new_password_confirmation">
                                            @error('new_password_confirmation')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <!-- Button Kembali (Left) -->
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="window.location.href='/admin-dashboard'">Kembali</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-css')
<style>
<style>
    .nav-tabs .nav-link {
        border-bottom: none !important;
    }

    .nav-tabs .nav-link.active {
        border-bottom: none !important;
    }

    .nav-tabs .nav-link:hover {
        border-bottom: none !important;
    }

</style>
@endsection
