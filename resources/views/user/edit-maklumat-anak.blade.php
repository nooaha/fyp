@extends('layouts.user_type.auth')

@section('content')
@php
    $childId = request('childId', Auth::user()->children->first()->id);
@endphp
<div class="card">
    <div class="container">
        <br>
        <h5>Edit Maklumat {{ $child->child_name }}</h5>
        <br>
        <div class="card-body">

            <form method="POST" action="{{ route('user-details.updateChildDetails', $child->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-control-label">Nama Penuh</label>
                    <input class="form-control" name="child_name" value="{{ $child->child_name }}" type="text" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Tarikh Lahir</label>
                    <input class="form-control" value="{{ date('d/m/Y', strtotime($child->child_dob)) }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Jantina</label>
                    <select class="form-control" id="parent_gender" name="gender" readonly>
                        <option value="">--Pilih Jantina--</option>
                        <option value="Lelaki" {{ $child->child_gender == 'Lelaki' ? 'selected' : '' }}>Lelaki</option>
                        <option value="Perempuan" {{ $child->child_gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                </div>
                <br>
                <!-- Add other fields here -->
                <div class="d-flex mt-3 justify-content-end">
                    <button type="button" class="btn btn-secondary me-2" id="cancelButton">Batal</button>
                    <button type="submit" class="btn btn-primary" style="float: right">Kemas kini Maklumat</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var cancelButton = document.getElementById('cancelButton');

        if (cancelButton) {
            cancelButton.addEventListener('click', function () {
                window.location.href = "{{ route('user-details.showParentDetail', ['childId' => request('childId', Auth::user()->children->first()->id)]) }}";
            });
        }
    });
</script>