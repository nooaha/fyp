@extends('layouts.user_type.auth')

@section('content')
@php
    // Get the first child of the user or null if no children (although your system will always have at least one child)
    $firstChild = Auth::user()->children->first();
    $childId = $firstChild ? $firstChild->id : null;
@endphp

<div class="card">
    <div class="container">
        <br>
        <h5>Tambah Maklumat Anak</h5>
        <br>

        <form
            action="{{ route('user-details.storeChildDetails', ['childId' => $childId ?? Auth::user()->children->first()->id]) }}"
            method="POST">
            @csrf
            <div id="ChildContainer">
                <div class="form-group">
                    <label class="form-control-label">Nama Penuh</label>
                    <input class="form-control" type="text" name="child_name" placeholder="Nama Penuh" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Tarikh Lahir</label>
                    <input class="form-control" type="date" name="child_dob" required>
                </div>
                <div class="form-group mb-5">
                    <label class="form-control-label">Jantina</label>
                    <select class="form-control" name="child_gender" required>
                        <option value="">--Pilih Jantina--</option>
                        <option value="Lelaki">Lelaki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" id="cancelButton">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Daftar</button>
            </div>
        </form>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var cancelButton = document.getElementById('cancelButton');

    if (cancelButton) {
        cancelButton.addEventListener('click', function() {
            window.location.href = "{{ route('user-details.showParentDetail', ['childId' => request('childId', Auth::user()->children->first()->id)]) }}";
        });
    }
});
</script>