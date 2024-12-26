@extends('layouts.user_type.auth')

@section('content')
    <div class="card">
        <div class="container">
            <br>
            <h2>Maklumat {{ $child->child_name }}</h2>
            <br>
            <div id="ChildContainer">
                <div class="form-group">
                    <label class="form-control-label">Nama Penuh</label>
                    <input class="form-control" value="{{ $child->child_name }}" type="text" readonly>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Tarikh Lahir</label>
                    <input class="form-control" value="{{ date('d/m/Y', strtotime($child->child_dob)) }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Jantina</label>
                    <input class="form-control" value="{{ $child->child_gender }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Tinggi (cm)</label>
                    <input class="form-control" value="{{ $child->height }} " readonly>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Berat (kg)</label>
                    <input class="form-control" value="{{ $child->weight }} " readonly>
                </div>
            </div>
            <br>
            <a href="/papar-maklumat" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
