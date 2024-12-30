@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- start letak foreach loop-->
    <h5 class="card-title mb-3">Penilaian Perkembangan</h5>

    <div class="card mb-3">
        @php
            // Assuming $ageInMonths is passed from the controller
            $years = floor($ageInMonths / 12);
            $months = $ageInMonths % 12;
        @endphp
        <div class="card-body px-4 pb-1 mb-3">
            <h><strong>Paparan Maklumat Anak</strong></h4>
                <p class="text-m mb-0">
                    Nama Anak:
                    <span class="font-weight-bold ms-1" style="color: #3F51B2;">{{ $child->child_name }}</span><br>
                    Umur:
                    <span class="font-weight-bold ms-1" style="color: #3F51B2;">{{ $years }} tahun {{ $months }}
                        bulan</span>
                </p>
        </div>
    </div>
    @foreach ($milestoneProgress as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h6 class="card-title mb-3">
                    {{ $item['milestone']->title }} - {{ $item['milestone']->age_category }} bulan
                </h6>
                <div class="row align-items-center">
                    <!-- Progress Label -->
                    <div class="col-md-4">
                        <p class="mb-0">Peratusan Pencapaian Perkembangan</p>
                    </div>
                    <!-- Progress Bar -->
                    <div class="col-md-5 mb-2">
                        <div class="progress progress-lg">
                            <div class="progress-bar progress-bar-striped bg-success d-flex justify-content-center align-items-center"
                                role="progressbar"
                                style="width: {{ $item['progress'] ?? 0 }}%; height: 25px; font-weight: bold; color: black;"
                                aria-valuenow="{{ $item['progress'] ?? 0 }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $item['progress'] ?? 0 }}%
                            </div>
                        </div>

                    </div>
                    <!-- Record Progress Button -->
                    <div class="col-md-3 text-end">
                        <a href="{{ route('record-milestone.index', ['milestone_id' => $item['milestone']->id, 'childId' => request('childId')]) }}"
                            class="btn btn-primary">Rekod Perkembangan</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection