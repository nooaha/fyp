@extends('layouts.user_type.auth')

@section('content')
    <!-- Users Table -->
    <div class="card">
        <div class="container">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Senarai Pengguna</h5>
                <!--<a href="" class="btn btn-success btn-sm">+&nbsp; Tambah Senarai</a>-->

            </div>
            <table class="table align-items-center mb-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 5%;">Id</th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 40%;">Nama </th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 20%;">Email </th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 15%;">Nama Pengguna</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                            style="width: 25%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userDetails as $detail)
                        <tr>
                            <td class="align-middle text-xs" style="width: 10%; white-space: normal;">
                                {{ $detail->id }}
                            </td>
                            <td class="align-middle text-xs" style="width: 30%; white-space: normal;">
                                {{ $detail->name ?? 'N/A' }}
                            </td>
                            <td class="align-middle text-xs" style="width: 30%; white-space: normal;">
                                {{ $detail->email ?? 'N/A' }}
                            </td>
                            <td class="align-middle text-xs" style="width: 30%; white-space: normal;">
                                {{ $detail->username ?? 'N/A' }}
                            </td>
                            <td class="align-middle text-center text-xs" style="width: 35%; white-space: normal;">

                                <!-- Delete button -->
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                    href="{{ route('user-details.destroyUserDetails', $detail->id) }}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $detail->id }}').submit();">
                                    <i class="far fa-trash-alt me-2"></i>Padam
                                </a>
                                <form id="delete-form-{{ $detail->id }}"
                                    action="{{ route('user-details.destroyUserDetails', $detail->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <!-- Edit button -->
                                <a class="btn btn-link text-dark px-3 mb-0"
                                    href="{{ route('user-details.editUserDetails', $detail->id) }}">
                                    <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Sunting
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>
@endsection
