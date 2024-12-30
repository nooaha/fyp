@extends('layouts.user_type.auth')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
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
                        <form id="milestoneForm" method="POST" action="{{ route('record-milestone.store') }}">
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

                                        <input type="radio" class="btn-check milestone-alert" name="questions[{{ $question->id }}]" id="no_{{ $question->id }}" value="no" autocomplete="off"
                                            data-alert="{{ in_array($question->id, [6,13]) ? 'true' : 'false' }}"
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
                    <button type="button" id="rekodButton" class="btn btn-primary" style="float: right">Simpan Rekod</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#rekodButton').addEventListener('click', function (e) {
            // Prevent default action of the button
            e.preventDefault();

            // Check for "Tidak" answers in specific questions
            let showAlert = false;
            document.querySelectorAll('input[data-alert="true"]:checked').forEach(function (input) {
                if (input.value === 'no') {
                    showAlert = true;
                }
            });

            // Show alert if condition is met
            if (showAlert) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Sila jumpa doktor untuk pemeriksaan lanjut.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Submit the form after alert is acknowledged
                    document.querySelector('#milestoneForm').submit();
                });
            } else {
                // Submit the form normally if no issues
                document.querySelector('#milestoneForm').submit();
            }
        });
    });
</script>
@endsection
