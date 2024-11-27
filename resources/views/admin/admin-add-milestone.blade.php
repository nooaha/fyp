@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-0">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row mb-0">
                        <div class="col-md-9">
                            <h6 class="mb-0">Tambah Senarai Pencapaian Perkembangan</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form id="milestoneForm" action="{{ route('milestone-checklists.store') }}" method="POST">
                        @csrf
                        <!-- Milestone Name -->
                        <div class="form-group">
                            <label class="form-control-label">Nama Senarai Pencapaian Perkembangan</label>
                            <input class="form-control" type="text" placeholder="Nama senarai" id="title" name="title"
                                required>
                        </div>

                        <!-- Age Category -->
                        <div class="form-group mb-4">
                            <label class="form-control-label">Kategori Umur (bulan)</label>
                            <input class="form-control" type="number" placeholder="Umur" id="age_category"
                                name="age_category" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Penerangan Senarai Pencapaian Perkembangan</label>
                            <textarea class="form-control" placeholder="Penerangan senarai" id="description"
                                name="description"></textarea>
                        </div>

                        <!-- Questions Container -->
                        <div class="row mt-5">
                            <div class="col-md-9 pt-4">
                                <label class="form-control-label">Soalan Pencapaian Perkembangan</label>
                            </div>
                            <div class="col-md-3 text-end">
                                <!-- Single Button to Add New Questions -->
                                <button type="button" class="btn btn-success mb-3" id="addQuestionBtn">+&nbsp; Tambah
                                    Soalan</button>
                            </div>

                            <div id="questionsContainer">
                                <div class="form-group question-group d-flex align-items-center">
                                    <input class="form-control ml-2" type="text" placeholder="Tambah Soalan"
                                        name="questions[]">
                                    <button type="button" class="btn btn-danger ml-2 delete-btn">Padam</button>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <!-- Submit Button -->
                            <a href="{{ route('milestone-checklists.index') }}" class="btn btn-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary" style="float: right">+&nbsp; Tambah
                                Senarai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    $(document).ready(function () {
        // Add new question input field when 'Tambah Soalan' button is clicked
        $('#addQuestionBtn').click(function () {
            $('#questionsContainer').append(`
                <div class="form-group question-group d-flex align-items-center">
                    <input class="form-control ml-2" type="text" placeholder="Tambah Soalan" name="questions[]">
                    <button type="button" class="btn btn-danger ml-2 delete-btn">Padam</button>
                </div>
            `);
        });

        // Remove question input field when 'Hapus' button is clicked
        $(document).on('click', '.delete-btn', function () {
            $(this).closest('.form-group').remove();
        });

        // Front-end validation: Ensure at least one question is added before submission
        $('#milestoneForm').submit(function (event) {
            var hasQuestion = false;
            $('input[name="questions[]"]').each(function () {
                if ($(this).val().trim() !== '') {
                    hasQuestion = true;
                    return false; // Exit loop if at least one question is filled
                }
            });

            if (!hasQuestion) {
                alert('Sila tambahkan sekurang-kurangnya satu soalan.');
                event.preventDefault(); // Stop form from submitting
            }
        });
    });
</script>
