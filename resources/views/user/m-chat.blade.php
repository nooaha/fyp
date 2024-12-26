@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- start letak foreach loop-->
    <h5 class="card-title mb-3">Modified Checklist Autism Test(M-CHAT)</h5>

    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title mb-3">Apa itu M-CHAT?</h6>
            <div class="row align-items-center">
                <!-- Peratusan Pencapaian -->
                <div class="col-md-12">
                    <p class="mb-0 mb-1">
                        Modified Checklist for Autism in Toddlers (M-CHAT) adalah alat pemeriksaan perkembangan yang
                        disahkan untuk kanak-kanak berumur antara 16 dan 30 bulan. Ia dirancang untuk mengenal pasti
                        kanak-kanak yang mungkin mendapat manfaat daripada penilaian perkembangan dan autisme yang lebih
                        teliti.
                    </p>
                </div>
            </div>

            <!-- Objektif Section -->
            <h6 class="mt-4">1. Objektif</h6>
            <p>
                Untuk mengesan tanda-tanda awal autisme dengan menggunakan senarai semak (M-CHAT) dan merujuk kepada
                Pakar
                Perubatan Keluarga/Pakar Pediatrik sekiranya perlu.
            </p>

            <!-- Instructions Section -->
            <h6 class="mt-4">2. Bagaimana Menganalisa Senarai Semak</h6>
            <ul>
                <li>Ibubapa perlu menjawab Ya atau Tidak kepada semua soalan 1 - 23.</li>
                <li>Enam item yang di gelapkan adalah soalan yang kritikal iaitu 2, 7, 9, 13, 14, 15.</li>
            </ul>
        </div>

    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title mb-3">Sejarah Saringan M-CHAT</h6>
            <d class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bil.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tarikh
                                Saringan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Skor</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Keputusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($results->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center mb-0 text-xs">Tiada rekod saringan M-CHAT</td>
                            </tr>
                        @else
                            @foreach ($results as $result)
                                <tr>
                                    <td class="align-middle text-center text-xs" style="width: 3%;">
                                        <span>{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="align-middle text-xs">
                                        <span>{{ $result->created_at }}</span>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <span>{{ $result->score }}</span>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <span class="badge 
                                                @if($result->risk_level == 'RISIKO TINGGI')
                                                    bg-gradient-danger
                                                @elseif($result->risk_level == 'RISIKO SEDERHANA')
                                                    bg-gradient-warning
                                                @else
                                                    bg-gradient-success
                                                @endif">
                                            {{ $result->risk_level }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
        </div>
    </div>
</div>
<div class="text-end mt-4">
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('mchat.create', ['childId' => request('childId')]) }}" class="btn btn-primary">Ambil Ujian</a>
</div>
@endsection