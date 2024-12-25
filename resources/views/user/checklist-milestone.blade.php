@extends('layouts.user_type.auth')

@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-header pb-0 mb-0">
            <h5 class="card-title">Senarai Semak Perkembangan - {{ $milestone->age_category }}</h5>
        </div>
        <div class="card-body">
            <div class="card bg-light text-dark mt-0 mb-3">
                <div class="card-body pb-1">
                    <p><strong>Penerangan:</strong> {{ $milestone->description }}</p>
                </div>
            </div>
            <p><strong>Arahan: Pilih jawapan 'Ya' atau 'Tidak' di ruang yang berkaitan</strong></p>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No. Soalan
                            </th>
                            <th
                                class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                Soalan</th>
                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                Jawapan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="POST" action="{{ route('record-milestone.store') }}">
                            @csrf
                            <!-- Hidden fields for childId and milestoneId -->
                            <input type="hidden" name="childId" value="{{ request('childId') }}">
                            <input type="hidden" name="milestone_id" value="{{ $milestone->id }}">

                            @foreach($questions as $question)
                                <tr>
                                    <td class="align-middle text-center" style="width: 5%;">
                                        <span>{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="align-middle" style="width: 75%; white-space: normal;">
                                        <span>{{ $question->question }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <input type="radio" class="btn-check" name="questions[{{ $question->id }}]" id="yes_{{ $question->id }}" value="yes" autocomplete="off"
                                            {{ isset($responses[$question->id]) && $responses[$question->id]->completed ? 'checked' : '' }}>
                                        <label class="btn btn-outline-success" for="yes_{{ $question->id }}">Ya</label>

                                        <input type="radio" class="btn-check" name="questions[{{ $question->id }}]" id="no_{{ $question->id }}" value="no" autocomplete="off"
                                            {{ isset($responses[$question->id]) && !$responses[$question->id]->completed ? 'checked' : '' }}>
                                        <label class="btn btn-outline-secondary" for="no_{{ $question->id }}">Tidak</label>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('child-milestone.showMilestoneList', ['childId' => request('childId')]) }}"
                        class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="float: right">Simpan Rekod</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection