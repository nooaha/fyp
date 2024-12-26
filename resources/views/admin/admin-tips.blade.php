@extends('layouts.user_type.auth')

@section('content')
    <!-- Tips Table -->
    <div class="card">
        <div class="container">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Senarai Kategori Tips</h2>
                <button type="button" class="btn btn-success btn-sm btn-add"
                    onclick="window.location.href='{{ route('tips-categories.create') }}'">Tambah</button>
            </div>

            <table class="table align-items-center mb-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 5%;">Id</th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 40%;">Tajuk </th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 15%;">Kategori umur </th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 20%;">Gambar </th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 15%;">Tarikh Akhir Kemaskini</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                            style="width: 30%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipscategories as $tipscategory)
                        <tr>
                            <td class="align-middle text-xs" style="width: 10%; white-space: normal;">
                                {{ $tipscategory->id }}
                            </td>
                            <td class="align-middle text-xs" style="width: 30%; white-space: normal;">
                                {{ $tipscategory->tips_name ?? 'N/A' }}
                            </td>
                            <td class="align-middle text-xs" style="width: 30%; white-space: normal;">
                                {{ $detail->age_category ?? 'N/A' }}
                            </td>
                            <td class="align-middle text-xs" style="width: 30%; white-space: normal;">
                                {{ $detail->image ?? 'N/A' }}
                            </td>
                            <td class="align-middle text-center text-xs" style="width: 35%; white-space: normal;">

                                <!-- Delete button -->
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href=""
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
                                <a class="btn btn-link text-dark px-3 mb-0" href="">
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
