@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h5 class="card-title mb-3">Keputusan Ujian Saringan Modified Checklist Autism Test(M-CHAT)</h5>

    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title mb-3">Maklum Balas Saringan M-CHAT</h6>
            <div class="row align-items-center">
                <!-- Peratusan Pencapaian -->
                <div class="col-md-12">
                    <p class="mb-0 mb-1">
                        Skor anak anda adalah <strong> {{ $results->score }}</strong>
                    </p>
                    <p class="mb-0 mb-1">
                        Oleh itu anak anda mungkin mempunyai Risiko Sederhana ASD (Autism Spectrum Disorder)
                    </p>
                    <br>
                    <p class="mb-0 mb-1">
                        Risiko <strong> {{ $results->risk_level }}</strong> Jumlah skor adalah 3 hingga 7 : Adalah
                        diterima untuk memintas tindakan susulan dan merujuk segera untuk penilaian diagnostik dan
                        penilaian kelayakan untuk intervensi awal.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('mchat.index', ['childId' => request('childId')]) }}"
            class="btn btn-secondary me-2">Kembali</a>
        <button type="submit" class="btn btn-primary" style="float: right">Lihat Intervensi</button>
    </div>
</div>
@endsection