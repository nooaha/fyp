@extends('layouts.user_type.auth')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <!-- Tips Table -->
    <div class="card">
        <div class="container">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Senarai Intervensi</h4>
                <button type="button" class="btn btn-success btn-sm btn-add"
                    onclick="window.location.href='{{ route('interventions.create') }}'">+&nbsp; Tambah</button>
            </div>

            <table class="table align-items-center mb-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 5%;">Id</th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 40%;">Tajuk</th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 20%;">Gambar </th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 15%;">Tarikh Akhir Kemaskini</th>
                        <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                            style="width: 30%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($interventions as $intervention)
                        <tr>
                            <td class="align-middle text-xs">{{ $intervention->id }}</td>
                            <td class="align-middle text-xs"
                                style="white-space: normal; word-wrap: break-word; overflow-wrap: break-word; max-width: 200px;">
                                {{ $intervention->interventions_title ?? 'N/A' }}</td>
                            <td class="align-middle text-center text-xs">
                                @if ($intervention->interventions_image)
                                    <img src="{{ asset($intervention->interventions_image) }}" alt="Image"
                                        style="width: 100px; height: auto;">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="align-middle text-center text-xs">{{ $intervention->updated_at }}</td>
                            <!--tindakan-->
                            <td class="align-middle text-center text-xs"
                                style="white-space: normal; word-wrap: break-word; overflow-wrap: break-word; max-width: 200px;">
                                <!-- show Button -->
                                <a class="btn btn-link text-info px-3 mb-0"
                                    href="{{ route('interventions.show', $intervention->id) }}">
                                    <i class="fas fa-eye text-info me-2" aria-hidden="true"></i>Papar
                                </a>
                                <!-- delete Button -->
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href=""
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $intervention->id }}').submit();">
                                    <i class="far fa-trash-alt me-2"></i>Padam
                                </a>
                                <form id="delete-form-{{ $intervention->id }}"
                                    action="{{ route('interventions.destroy', $intervention->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <!-- Edit Button -->
                                <a class="btn btn-link text-dark px-3 mb-0"
                                    href="{{ route('interventions.edit', $intervention->id) }}">
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
