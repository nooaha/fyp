@extends('layouts.user_type.auth')

@section('content')
@php
    $childId = request('childId', Auth::user()->children->first()->id);
@endphp
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 45%;"></div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4 align-items-center">
                <!-- Image Column -->
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../assets/img/profile-avatar.png" alt="..." class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>

                <!-- Text and Button Column -->
                <div class="col">
                    <div class="d-flex align-items-center justify-content-between">
                        <!-- Name and Role -->
                        <div>
                            <h5 class="mb-1">
                                {{ auth()->user()->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ __('Ibu Bapa') }}
                            </p>
                        </div>
                        <!-- Button -->
                        <a href="{{ route('update-password.showChangePasswordForm',['childId' => $childId ?? Auth::user()->children->first()->id]) }}" class="btn btn-primary btn-sm">Tukar Kata Laluan</a>
                        
                    </div>
                </div>
            </div>


            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Maklumat Ibu Bapa</h5>
                    </div>
                    <div class="card-body">
                        <!-- Parent Details Form -->
                        <form>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Parent's Full Name -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name" class="form-control-label">Nama Penuh</label>
                                        <input class="form-control" name="full_name"
                                            value="{{ $parentDetails->full_name ?? 'N/A' }}" type="text" readonly>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-email" class="form-control-label">Email</label>
                                        <input class="form-control" value="{{ $user->email ?? 'N/A' }}" type="email"
                                            readonly>
                                    </div>
                                </div>
                                <!-- Parent's Date of Birth -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-dob" class="form-control-label">Tarikh Lahir</label>
                                        <input class="form-control" name="dob"
                                            value="{{ $parentDetails->dob ?? 'N/A' }}" type="date" readonly>
                                    </div>
                                </div>
                                <!-- Gender -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-gender" class="form-control-label">Jantina</label>
                                        <input class="form-control" name="gender"
                                            value="{{ $parentDetails->gender ?? 'N/A' }}" type="text" readonly>
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="user-address" class="form-control-label">Alamat</label>
                                        <input class="form-control" name="address"
                                            value="{{ $parentDetails->address ?? 'N/A' }}" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Children Details Table -->
                        <div class="card-header d-flex justify-content-between align-items-center pb-0">
                            <h5 class="mb-0">Maklumat Anak</h5>
                            <a href="{{ route('user-details.createChildDetails',['childId' => $childId ?? Auth::user()->children->first()->id]) }}" class="btn btn-success btn-sm">+&nbsp; Tambah Anak</a>
                        </div>
                        <table class="table align-items-center mb-0" style="table-layout: fixed; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        style="width: 10%;">No.</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        style="width: 24%;">Nama Anak</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        style="width: 15%;">Umur</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        style="width: 45%;">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($childDetails as $detail)
                                    @php
                                        // Calculate age in years and months for this child
                                        $years =
                                            $detail->ageInMonths !== null ? floor($detail->ageInMonths / 12) : 'N/A';
                                        $months = $detail->ageInMonths !== null ? $detail->ageInMonths % 12 : 'N/A';
                                    @endphp
                                    <tr>
                                        <td class="align-middle text-xs" style="width: 10%; white-space: normal;">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="align-middle text-xs" style="width: 25%; white-space: normal;">
                                            {{ $detail->child_name ?? 'N/A' }}
                                        </td>
                                        <td class="align-middle text-center text-xs" style="width: 15%;">
                                            <span class="badge bg-gradient-secondary">
                                                {{ $years }} tahun {{ $months }} bulan
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-xs"
                                            style="width: 45%; white-space: normal;">
                                            <!-- Show more button that links to the child details page -->
                                            <a class="btn btn-link text-info px-3 mb-0"
                                                href="{{ route('user-details.showChildDetails', $detail->id) }}">
                                                <i class="fas fa-eye text-info me-2" aria-hidden="true"></i>Papar maklumat
                                            </a>

                                            <!-- Delete button -->
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                href="{{ route('user-details.destroyChildDetails', $detail->id) }}"
                                                onclick="event.preventDefault(); document.getElementById('delete-btn-{{ $detail->id }}').submit();">
                                                <i class="far fa-trash-alt me-2"></i>Padam
                                            </a>
                                            <form id="delete-btn-{{ $detail->id }}"
                                                action="{{ route('user-details.destroyChildDetails', $detail->id) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <!-- Edit button -->
                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="{{ route('user-details.editChildDetails', $detail->id) }}">
                                                <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Sunting
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle delete button clicks dynamically
        $(document).on('click', '.delete-btn', function () {
            if (confirm('Adakah anda pasti ingin memadam maklumat ini?')) {
                const childId = $(this).data('children-id');
                if (childId) {
                    // Submit the form for the corresponding child ID
                    $(`#delete-btn-${childId}`).submit();
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var cancelButton = document.getElementById('cancelButton');

        if (cancelButton) {
            cancelButton.addEventListener('click', function () {
                // Redirect to the appropriate route
                window.location.href = "{{ route('user-details.showParentDetail', ['id' => $detail->id ?? null]) }}";
            });
        }
    });
</script>

