@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Edit Senarai Pencapaian Perkembangan</h6>
                </div>
                <div class="card-body">
                    <!-- Specify form action to update the milestone -->
                    <form method="POST" action="{{ route('milestone-checklists.update', $milestone->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Milestone Name -->
                        <div class="form-group">
                            <label for="milestoneName" class="form-control-label">Nama Senarai Pencapaian
                                Perkembangan</label>
                            <input class="form-control" type="text" id="milestoneName" name="milestone_name"
                                value="{{ $milestone->title }}" required>
                        </div>

                        <!-- Age Category -->
                        <div class="form-group">
                            <label for="ageCategory" class="form-control-label">Kategori Umur (bulan)</label>
                            <input class="form-control" type="text" id="ageCategory" name="age_category"
                                value="{{ $milestone->age_category }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-control-label">Penerangan Senarai Pencapaian
                                Perkembangan</label>
                                <textarea id="description" name="description" class="form-control">{{ old('description',$milestone->description) }}</textarea>

                        </div>

                        <div class="row">
                            <div class="col-md-9 pt-4">
                                <label class="form-control-label">Soalan Pencapaian Perkembangan</label>
                            </div>
                            <div class="col-md-3 text-end">
                                <!-- Single Button to Add New Questions -->
                                <button type="button" class="btn btn-success mb-3" id="addQuestionBtn">+&nbsp;Tambah
                                    Soalan</button>
                            </div>
                        </div>

                        <!-- Questions Container -->
                        <div id="questionsContainer">
                            <!-- Loop foreach through existing questions -->
                            @foreach ($milestone->questions as $question)
                                <div class="form-group d-flex align-items-center">
                                    <input class="form-control me-2" type="text" name="questions[{{ $question->id }}]"
                                        value="{{ $question->question }}" required>
                                    <button type="button" class="btn btn-danger ml-2 delete-btn"
                                        data-question-id="{{ $question->id }}">Padam</button>
                                </div>
                            @endforeach
                        </div>

                        <!-- Hidden input for deleted questions -->
                        <input type="hidden" id="deletedQuestions" name="deleted_questions" value="">

                        <div class="d-flex mt-3 justify-content-end">
                            <!-- Submit Button -->
                            <button type="button" class="btn btn-secondary me-2" id="cancelButton">Batal</button>
                            <button type="submit" class="btn btn-primary" style="float: right">Kemas kini
                                Senarai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    $(document).ready(function () {
        // Add new question input field when 'Tambah Soalan' button is clicked
        $('#addQuestionBtn').click(function () {
            $('#questionsContainer').append(`
                <div class="form-group d-flex align-items-center">
                    <input class="form-control me-2" type="text" name="new_questions[]" placeholder="Tambah Soalan">
                    <button type="button" class="btn btn-danger ml-2 delete-btn">Padam</button>
                </div>
            `);
        });

        // Delete a question (remove from the DOM and add to the deleted list)
        $('#questionsContainer').on('click', '.delete-btn', function () {
            if (confirm('Adakah anda pasti ingin memadam soalan ini?')) {
                const questionId = $(this).data('question-id');
                if (questionId) {
                    // Add the question ID to the hidden input for deletion
                    let deletedQuestions = $('#deletedQuestions').val();
                    deletedQuestions += questionId + ',';
                    $('#deletedQuestions').val(deletedQuestions);
                }
                // Remove the question from the form
                $(this).closest('.form-group').remove();
            }
        });
    });
    
    document.addEventListener('DOMContentLoaded', function() {
        var cancelButton = document.getElementById('cancelButton');
        
        if (cancelButton) {
            cancelButton.addEventListener('click', function() {
                window.location.href = "{{ route('milestone-checklists.show', $milestone->id) }}";
            });
        }
    });

</script>