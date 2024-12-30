@extends('layouts.user_type.auth')

@section('content')
    <!-- Tips Table -->
    <div class="card">
        <div class="container">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Senarai Kategori Tips</h2>
                <button type="button" class="btn btn-success btn-sm btn-add"
                    onclick="window.location.href='{{ route('tips-categories.create') }}'">+&nbsp; Tambah</button>
            </div>

            <table class="table align-items-center mb-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 5%;">Id</th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 10%;">Umur</th>
                            <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 35%;">Penerangan </th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 20%;">Gambar </th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 15%;">Tarikh Akhir Kemaskini</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                            style="width: 40%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipscategories as $tipscategory)
                        <tr>
                            <td class="align-middle text-xs">{{ $tipscategory->id }}</td>
                            <td class="align-middle text-xs">{{ $tipscategory->age_category ?? 'N/A' }}</td>
                            <td class="align-middle text-xs">{{ $tipscategory->tips_name ?? 'N/A' }}</td>
                            <td class="align-middle text-xs">
                                @if ($tipscategory->image)
                                    <img src="{{ asset($tipscategory->image) }}" alt="Image"
                                        style="width: 100px; height: auto;">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="align-middle text-center text-xs">{{ $tipscategory->updated_at }}</td>
                            <!--tindakan-->
                            <td class="align-middle text-center text-xs">
                                <!-- show Button -->
                                <a class="btn btn-link text-info px-3 mb-0"
                                    href="{{ route('tips-categories.show', $tipscategory->id) }}">
                                    <i class="fas fa-eye text-info me-2" aria-hidden="true"></i>Papar kandungan
                                </a>
                                <!-- delete Button -->
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href=""
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tipscategory->id }}').submit();">
                                    <i class="far fa-trash-alt me-2"></i>Padam
                                </a>
                                <form id="delete-form-{{ $tipscategory->id }}"
                                    action="{{ route('tips-categories.destroy', $tipscategory->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <!-- Edit Button -->
                                <a class="btn btn-link text-dark px-3 mb-0"
                                    href="{{ route('tips-categories.edit', $tipscategory->id) }}">
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
