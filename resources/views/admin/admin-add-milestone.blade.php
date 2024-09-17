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
                        <form method="POST" >
                            @csrf
                            <!-- Milestone Name -->
                            <div class="form-group">
                                <label for="milestoneName" class="form-control-label">Nama Senarai Pencapaian Perkembangan</label>
                                <input class="form-control" type="text" placeholder="Nama senarai" id="milestoneName" name="milestone_name">
                            </div>
                            
                            <!-- Age Category -->
                            <div class="form-group mb-4">
                                <label for="ageCategory" class="form-control-label">Kategori Umur (bulan)</label>
                                <input class="form-control" type="number" placeholder="Umur" id="ageCategory" name="age_category">
                            </div>

                            <!-- Questions Container -->
                             <div class="row">
                                <div class="col-md-9 pt-4">
                                    <label class="form-control-label ">Soalan Pencapaian Perkembangan</label>
                                </div>
                                <div class="col-md-3 text-end">
                                    <!-- Single Button to Add New Questions -->
                                    <button type="button" class="btn btn-success mb-3 " id="addQuestionBtn">Tambah Soalan</button>
                                </div>
                                

                                <div id="questionsContainer">
                                    <div class="form-group question-group">
                                        <input class="form-control" type="text" placeholder="Tambah Soalan" name="questions[]">
                                    </div>
                                </div>
                             </div>
                                <div class="d-flex justify-content-end">
                                    <!-- Submit Button -->
                                    <button type="button" class="btn btn-secondary me-2" onclick="window.history.back()">Kembali</button>
                                    <button type="submit" class="btn btn-primary" style="float: right">Tambah Senarai</button>
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
        $(document).ready(function() {
            // Add new question input field when 'Tambah Soalan' button is clicked
            $('#addQuestionBtn').click(function() {
                $('#questionsContainer').append(`
                    <div class="form-group question-group">
                        <input class="form-control" type="text" placeholder="Tambah Soalan" name="questions[]">
                    </div>
                `);
            });
        });
    </script>
