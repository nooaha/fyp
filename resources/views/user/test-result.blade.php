@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h5 class="card-title mb-3">Keputusan Ujian Saringan Modified Checklist Autism Test(M-CHAT)</h5>

    <div class="card card-frame mb-3">
        <div class="card-body">
            <h6 class="card-title mb-3">Maklum Balas Saringan M-CHAT</h6>
            <div class="row align-items-center">
                <!-- Feedback Section -->
                <div class="col-md-12">
                    <p class="mb-1">
                        Skor M-CHAT {{ $child->child_name }} adalah <strong>{{ $results->score }}</strong>.
                    </p>
                    <p class="mb-1">
                        Oleh itu anak anda mungkin mempunyai
                        <span class="badge 
                        @if ($results->risk_level === 'RISIKO TINGGI')
                            bg-gradient-danger
                        @elseif ($results->risk_level === 'RISIKO SEDERHANA')
                            bg-gradient-warning
                        @else
                            bg-gradient-success
                        @endif">
                            {{ $results->risk_level }}
                        </span>  Autism Spectrum Disorder (ASD)
                    </p>
                    <br>
                    @if ($results->risk_level === 'RISIKO TINGGI')
                        <p class="mb-1">
                            <strong style="color: #D32F2F;">Risiko Tinggi:</strong> Risiko Tinggi menunjukkan jumlah skor
                            melebihi ambang kritikal.<br>
                        <ul>
                            <li>Segera rujuk kepada pakar pediatrik atau pakar psikologi untuk penilaian diagnostik.</li>
                            <li>Mengatur temujanji untuk penilaian intervensi awal.</li>
                        </ul>
                        <strong>Nota:</strong> Penilaian segera dapat membantu dalam menyediakan sokongan dan intervensi
                        awal.
                        </p>
                    @elseif ($results->risk_level === 'RISIKO SEDERHANA')
                        <p class="mb-1">
                            <strong style="color: #FFC107;">Risiko Sederhana:</strong> Risiko Sederhana menunjukkan skor
                            sederhana.<br>
                        <ul>
                            <li>Lakukan saringan tambahan untuk menentukan keperluan tindakan selanjutnya.</li>
                            <li>Berbincang dengan pakar pediatrik tentang sebarang kebimbangan atau simptom yang
                                diperhatikan.</li>
                        </ul>
                        <strong>Nota:</strong> Pemantauan berkala adalah penting untuk memastikan perkembangan anak dalam
                        tahap optimum.
                        </p>
                    @else
                        <p class="mb-1">
                            <strong style="color: #4CAF50;">Risiko Rendah:</strong> Risiko Rendah menunjukkan jumlah skor
                            berada di bawah ambang kritikal.<br>
                        <ul>
                            <li>Tiada tindakan susulan diperlukan pada masa ini.</li>
                            <li>Teruskan memantau perkembangan anak secara berkala.</li>
                        </ul>
                        <strong>Nota:</strong> Pastikan anak mendapat peluang untuk terus berkembang dengan sokongan
                        pendidikan dan persekitaran yang positif.
                        </p>
                    @endif
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