@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-8">
        <div class="row">
            <div class="col mt-0">
                <div class="card z-index-0">
                    <div class="card-body p-3">
                        <h4><strong>Maklumat Pengguna</strong></h4>
                        <br>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('user-details.store') }}" method="POST">
                            @csrf
                            <!-- Maklumat Ibu/Bapa -->
                            <h5>Maklumat Ibu/Bapa</h5>
                            <div class="form-group">
                                <label class="form-control-label">Nama Penuh</label>
                                <input class="form-control" type="text" id="parent_name" name="full_name" placeholder="Nama Penuh" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Tarikh Lahir</label>
                                <input class="form-control" type="date" id="parent_dob" name="dob" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Jantina</label>
                                <select class="form-control" id="parent_gender" name="gender" required>
                                    <option value="">--Pilih Jantina--</option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-5">
                                <label class="form-control-label">Alamat</label>
                                <input class="form-control" type="text" id="parent_address" name="address" placeholder="Alamat" required>
                            </div>

                            <!-- Maklumat Anak -->
                            <div class="row">
                                <div class="col-md-9 pb-4 pt-0">
                                    <h5>Maklumat Anak</h5>
                                </div>
                                <div class="col-md-3 text-end">
                                    <button type="button" class="btn btn-success mb-3 btn-sm" id="addChildBtn">+Tambah Anak</button>
                                </div>

                                <div id="ChildContainer">
                                    <div class="form-group">
                                        <label class="form-control-label">Nama Penuh</label>
                                        <input class="form-control" type="text" name="children[0][name]" placeholder="Nama Penuh" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Tarikh Lahir</label>
                                        <input class="form-control" type="date" name="children[0][dob]" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="form-control-label">Jantina</label>
                                        <select class="form-control" name="children[0][gender]" required>
                                            <option value="">--Pilih Jantina--</option>
                                            <option value="Lelaki">Lelaki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" style="float: right" class="btn btn-primary btn-sm">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            let childCount = 1; // Start with the first child
            $('#addChildBtn').click(function() {
                $('#ChildContainer').append(`
                    <div class="form-group">
                        <label class="form-control-label">Nama Penuh</label>
                        <input class="form-control" type="text" placeholder="Nama Penuh" name="children[${childCount}][name]" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Tarikh Lahir</label>
                        <input class="form-control" type="date" name="children[${childCount}][dob]" required>
                    </div>
                    <div class="form-group mb-5">
                        <label class="form-control-label">Jantina</label>
                        <select class="form-control" name="children[${childCount}][gender]" required>
                            <option value="">--Pilih Jantina--</option>
                            <option value="Lelaki">Lelaki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                `);
                childCount++; // Increment the child count for the next child
            });
        });
    </script>
@endsection
