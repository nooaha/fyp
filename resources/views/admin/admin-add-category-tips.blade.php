@extends('layouts.user_type.auth')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-0">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row mb-0">
                            <div class="col-md-9">
                                <h6 class="mb-0">Tambah Senarai Tips</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <!-- Form to handle both the category and image upload -->
                        <form id="tipsForm" action="{{ route('tips-categories.store') }}" method="POST"
                            enctype="multipart/form-data"> <!--used to handle file uploads, including images-->
                            @csrf

                            <!-- Tips Category -->
                            <div class="form-group">
                                <label for="tipscategoryname" class="form-control-label">Nama Kategori</label>
                                <input class="form-control" type="text" placeholder="Nama kategori" id="tipscategoryname"
                                    name="tipscategoryname" required>
                            </div>

                            <!-- Image Upload Section -->
                            <div class="form-group">
                                <label for="image">Gambar:</label>
                                <input type="file" name="image" class="form-control" id="image" required>
                            </div>

                            <!-- Tip Container -->

                            <div class="row mt-5">
                                <div class="col-md-9 pt-4">
                                    <label class="form-control-label">Senarai Tips</label>
                                </div>
                                <div class="col-md-3 text-end">
                                    <!-- Single Button to Add New Tips -->
                                    <button type="button" class="btn btn-success mb-3" id="addTipsBtn">+&nbsp; Tambah
                                        Tips</button>
                                </div>

                                <div id="TipContainer">
                                    <div class="tips-set">
                                        <div class="form-group question-group d-flex align-items-center">
                                            <input class="form-control ml-2" type="text" placeholder="Tambah Tip"
                                                name="tipsTitle[]" required>
                                            <button type="button" class="btn btn-danger ml-2 delete-btn">Padam</button>
                                        </div>

                                        <div class="form-group question-group d-flex align-items-center">
                                            <input class="form-control ml-2" type="text" placeholder="Penerangan"
                                                name="tips_explain[]" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Buttons for form submission -->
                            <div class="d-flex justify-content-end">
                                <!-- Submit Button -->
                                <a href="{{ route('tips-categories.index') }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary" style="float: right">+&nbsp; Tambah
                                    Tip</button>
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
    $(document).ready(function() {
        // Add new question input field when 'Tambah Soalan' button is clicked
        $('#addTipsBtn').click(function() {
            $('#TipContainer').append(`
            <br><br>
        <div class="tips-set">
            <div class="form-group question-group d-flex align-items-center">
                <input class="form-control ml-2" type="text" placeholder="Tambah Tip" name="tipsTitle[]" required>
                <button type="button" class="btn btn-danger ml-2 delete-btn">Padam</button>
            </div>

            <div class="form-group question-group d-flex align-items-center">
                <input class="form-control ml-2" type="text" placeholder="Penerangan" name="tips_explain[]" required>
            </div>
        </div>
    `);
        });

        // Remove question input field when 'Hapus' button is clicked
        $(document).on('click', '.delete-btn', function() {
            // Find the closest parent set and remove it
            $(this).closest('.tips-set').remove();
        });


        // Front-end validation: Ensure at least one question is added before submission
        $('#tipsForm').submit(function(event) {
            var hasTips = false;
            $('input[name="tipsTitle[]"]').each(function() {
                if ($(this).val().trim() !== '') {
                    hasTips = true;
                    return false; // Exit loop if at least one question is filled
                }
            });

            if (!hasTips) {
                alert('Sila tambahkan sekurang-kurangnya satu tips.');
                event.preventDefault(); // Stop form from submitting
            }
        });
    });
</script>
