@extends('layouts.user_type.auth')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Edit Senarai Pencapaian Perkembangan</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Milestone Name -->
                            <div class="form-group">
                                <label for="milestoneName" class="form-control-label">Nama Senarai Pencapaian Perkembangan</label>
                                <input class="form-control" type="text" id="milestoneName" name="milestone_name" value="">
                            </div>
                            <div class="form-group">
                                <label for="milestoneName" class="form-control-label">Kategori Umur (bulan)</label>
                                <input class="form-control" type="text" id="ageCategory" name="age_category" value="">
                            </div>

                            <div class="row">
                                <div class="col-md-9 pt-4">
                                    <label class="form-control-label ">Soalan Pencapaian Perkembangan</label>
                                </div>
                                <div class="col-md-3 text-end">
                                    <!-- Single Button to Add New Questions -->
                                    <button type="button" class="btn btn-success mb-3 " id="addQuestionBtn">Tambah Soalan</button>
                                </div>
                            </div>
                            <!-- Questions Container -->
                            <div id="questionsContainer">
                                <!-- Loop foreach through existing questions -->
                                <div class="form-group d-flex align-items-center">
                                    <input class="form-control me-2" type="text" name="questions[]" value="">
                                    <button type="button" class="btn btn-danger ml-2 delete-btn" data-question-id="">Padam</button>
                                </div>
                                
                            </div>
                            <div class="d-flex mt-3 justify-content-end">
                                <!-- Submit Button -->
                                <button type="button" class="btn btn-secondary me-2" onclick="window.history.back()">Kembali</button>
                                <button type="submit" class="btn btn-primary" style="float: right">Kemas kini Senarai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add new question input field when 'Tambah Soalan' button is clicked
            $('#addQuestionBtn').click(function() {
                $('#questionsContainer').append(`
                    <div class="form-group d-flex align-items-center">
                        <input class="form-control me-2" type="text" name="new_questions[]" placeholder="Tambah Soalan">
                        <button type="button" class="btn btn-danger ml-2 delete-btn">Padam</button>
                    </div>
                `);
            });

            // Delete a question (remove from the DOM)
            $('#questionsContainer').on('click', '.delete-btn', function() {
            if (confirm('Adakah anda pasti ingin memadam soalan ini?')) {
                $(this).closest('.form-group').remove(); // Only delete if confirmed
            }
            });
        });
    </script>
    