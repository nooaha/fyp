@extends('layouts.user_type.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-0">

                <div class="card-header pb-0">
                    <div class="row mb-0">
                        <div class="col-md-9">
                            <h5 class="mb-0">Edit Kategori Umur:
                                <strong class="text-capitalize" style="color: #3F51B2;">{{ $tipscategory->age_category }} bulan</strong>
                            </h5>
                            <br>
                        </div>

                        <form action="{{ route('tips-categories.update', $tipscategory->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="form-control-label">Kategori Umur (bulan)</label>
                                <input class="form-control" name="age_category" value="{{ $tipscategory->age_category }}"
                                    type="text" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Penerangan</label>
                                <input class="form-control" name="tipscategoryname" value="{{ $tipscategory->tips_name }}"
                                    type="text" required>
                            </div>

                            <div class="form-group">
                                <label for="current_image">Gambar:</label>
                                <div style="border: 1px dashed #ccc; padding: 10px; width: fit-content;">
                                    @if ($tipscategory->image)
                                        <img src="{{ asset($tipscategory->image) }}" alt="Existing Image" style="max-width: 300px; height: auto;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Tukar Gambar:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                                <div class="d-flex mt-3 justify-content-end">
                                    <!-- Submit Button -->
                                    <button type="button" class="btn btn-secondary me-2 btn-sm" id="cancelButton">Batal</button>
                                    <button type="submit" class="btn btn-primary btn-sm" style="float: right">Kemas kini
                                        Tips</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add new question input field when 'Tambah Soalan' button is clicked
            $('#addContentBtn').click(function() {
                $('#TipContainer').append(`
                <div class="form-group d-flex align-items-center">
                    <input class="form-control me-2" type="text" name="new_content[]" placeholder="Tambah Kandungan">
                    <button type="button" class="btn btn-danger ml-2 delete-btn">Padam</button>
                </div>
            `);
            });

            // Delete a question (remove from the DOM and add to the deleted list)
            $('#TipContainer').on('click', '.delete-btn', function() {
                if (confirm('Adakah anda pasti ingin memadam kandungan ini?')) {
                    const contentId = $(this).data('content-id');
                    if (contentId) {
                        // Add the question ID to the hidden input for deletion
                        let deletedContent = $('#deletedContent').val();
                        deletedContent += contentId + ',';
                        $('#deletedContent').val(deletedContent);
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
                    window.location.href = "{{ route('tips-categories.index', $tipscategory->id) }}";
                });
            }
        });
    </script>
