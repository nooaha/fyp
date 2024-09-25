@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-8">
        <div class="row">
            <div class="col mt-0">
                <div class="card z-index-0">

                    <div class="card-body p-3">
                        <h4><strong>Maklumat Pengguna</strong></h4>
                        <br>
                        <form action="{{ route('submitUserInfo') }}" method="POST">
                            @csrf
                            <!-- Maklumat Ibu/Bapa -->
                            <h5>Maklumat Ibu/Bapa</h5>
                            <div class="form-group">
                                <label for="parent_name">Nama Penuh</label>
                                <input class="form-control" type="text" id="parent_name" name="parent_name" required>
                            </div>
                            <div class="form-group">
                                <label for="parent_dob">Tarikh Lahir</label>
                                <input class="form-control" type="date" id="parent_dob" name="parent_dob" required>
                            </div>

                            <div class="form-group">
                                <label for="parent_gender">Jantina</label> <!-- Label placed outside -->
                                <select class="form-control" id="parent_gender" name="parent_gender" required>
                                    <option value="">--Pilih Jantina--</option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group mb-5">
                                <label for="parent_address">Alamat</label>
                                <input class="form-control" type="text" id="parent_address" name="parent_address"
                                    required>
                            </div>

                            <!-- Maklumat Anak -->
                            <div class="row">
                                <div class="col-md-9 pb-4 pt-0">
                                    <h5>Maklumat Anak</h5>
                                </div>
                                <div class="col-md-3 text-end">
                                    <!-- Single Button to Add New Questions -->
                                    <button type="button" class="btn btn-success mb-3 " id="addChildBtn">Tambah
                                        Anak</button>
                                </div>

                                <div id="ChildContainer">

                                    <div class="form-group">
                                        <label for="child_name">Nama Penuh</label>
                                        <input class="form-control child_name" type="text" name="child_name[]" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="child_dob">Tarikh Lahir</label>
                                        <input class="form-control" type="date" id="child_dob" name="child_dob[]"
                                            required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="child_gender">Jantina</label> <!-- Label placed outside -->
                                        <select class="form-control" id="child_gender" name="child_gender" required>
                                            <option value="">--Pilih Jantina--</option>
                                            <option value="Lelaki">Lelaki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" style="float: right"
                                        class="btn btn-primary btn-lg">Daftar</button>
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
        $('#addChildBtn').click(function() {
            $('#ChildContainer').append(`
                                    <div class="form-group">
                                        <label for="child_name">Nama Penuh</label>
                                        <input class="form-control" type="text" id="child_name" name="child_name[]"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="child_dob">Tarikh Lahir</label>
                                        <input class="form-control" type="date" id="child_dob" name="child_dob[]" required>
                                    </div>
                                    <div class="form-group mb-5">

                                <label for="parent_gender">Jantina</label> <!-- Label placed outside -->
                                <select class="form-control" id="parent_gender" name="parent_gender" required>
                                    <option value="">--Pilih Jantina--</option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>

                `);
        });
    });
</script>
