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
            <div class="card" style="width: 100%;">
                <div class="card-header pb-0">
                    <div class="row mb-0">
                        <div class="col-md-9">
                            <h5 class="mb-0">{{ $milestoneChecklist->title }}</h5>
                        </div>
                        <div class="col-md-3 text-end">
                            <a href="{{ route('milestone-checklists.edit', $milestoneChecklist->id) }}"
                                class="btn btn-primary mb-3 btn-sm">Sunting</a>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="card bg-light text-dark">
                            <div class="card-body">
                                <p>
                                    <strong>Kategori Umur:</strong>
                                    <span class="badge bg-gradient-info">{{ $milestoneChecklist->age_category }}
                                        bulan</span>
                                </p>
                                <p><strong>Penerangan:</strong> {{ $milestoneChecklist->description }}</p>
                            </div>
                        </div>

                        <h6 class="mt-3">Senarai soalan</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        style="width: 5%;">No.</th>
                                    <th scope="col"
                                        class=" align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        style="width: 20%;">Soalan</th>
                                    <th class="align-middle text-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        style="width: 15%;">Tarikh Akhir kemaskini</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($milestoneChecklist->questions as $question)
                                    <tr>
                                        <td class="align-middle text-center text-sm"
                                            style="width: 5%; white-space: normal;">
                                            {{ $loop->iteration }}.
                                        </td>
                                        <td class="align-middle text-sm" style="width: 25%; white-space: normal;">
                                            {{ $question->question }}
                                        </td>
                                        <td class="align-middle text-center text-sm"
                                            style="width: 20%; white-space: normal;">
                                            {{ $question->updated_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('milestone-checklists.index') }}" class="btn btn-secondary me-2 btn-sm">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
