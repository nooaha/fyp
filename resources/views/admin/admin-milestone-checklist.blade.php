@extends('layouts.user_type.auth')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-0">
            <div class="card-header pb-0">
                <div class="row mb-0 mt-2">
                    <div class="col-md-9">
                        <h6 class="mb-0">Kemaskini Senarai Perkembangan</h6>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('milestone-checklists.create') }}" class="btn btn-success mb-3 btn-sm">+&nbsp;
                            Tambah Senarai</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" style="table-layout: fixed; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        style="width: 5%;">
                                        No.</th>
                                    <th class=" align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        style="width: 20%;">
                                        Tajuk Senarai</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        style="width: 15%;">
                                        Kategori Umur</th>
                                    <th class="align-middle text-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        style="width: 15%;">
                                        Tarikh Akhir kemaskini</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        style="width: 35%;">
                                        Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($checklists->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center mb-0 text-xs">Tiada rekod Senarai Pencapaian
                                            Perkembangan</td>
                                    </tr>
                                @else
                                    @foreach ($checklists as $checklist)
                                        <tr>
                                            <td class="align-middle text-center text-xs"
                                                style="width: 5%; white-space: normal;">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-xs" style="width: 20%; white-space: normal;">
                                                {{ $checklist->title }}
                                            </td>
                                            <td class="align-middle text-center text-xs">
                                                <span class="badge bg-gradient-secondary">{{ $checklist->age_category }}</span>
                                            </td>
                                            <td class="align-middle text-center text-xs"
                                                style="width: 20%; white-space: normal;">
                                                {{ $checklist->updated_at }}
                                            </td>
                                            <td class="align-middle text-center text-xs"
                                                style="width: 35%; white-space: normal;">
                                                <a class="btn btn-link text-info px-3 mb-0"
                                                    href="{{ route('milestone-checklists.show', $checklist->id) }}">
                                                    <i class="fas fa-eye text-info me-2" aria-hidden="true"></i>Papar soalan
                                                </a>

                                                <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                    href="{{ route('milestone-checklists.destroy', $checklist->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $checklist->id }}').submit();">
                                                    <i class="far fa-trash-alt me-2"></i>Padam
                                                </a>
                                                <form id="delete-form-{{ $checklist->id }}"
                                                    action="{{ route('milestone-checklists.destroy', $checklist->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a class="btn btn-link text-dark px-3 mb-0"
                                                    href="{{ route('milestone-checklists.edit', $checklist->id) }}">
                                                    <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Sunting
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            <form action="{{ route('admin.sendReminders') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm me-2">Hantar Peringatan
                                    Perkembangan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection