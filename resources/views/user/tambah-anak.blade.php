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
            <h2>Maklumat Anak</h2>
            <br>

        <form action="{{ route('user-details.storeChildDetails', ['childId' => $childId ?? Auth::user()->children->first()->id]) }}" method="POST">
            @csrf
            <div id="ChildContainer">
                <div class="form-group">
                    <label class="form-control-label">Nama Penuh</label>
                    <input class="form-control" type="text" name="child_name" placeholder= "Nama Penuh" required>
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
                <button type="submit" class="btn btn-primary btn-sm">Daftar</button>
            </div>
        </form>
    </div>
@endsection
