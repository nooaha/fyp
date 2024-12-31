@extends('layouts.user_type.auth')

@section('content')

    <div class="container">
        <h2 class="mb-3">Selamat Datang,<span class="text-capitalize" style="color: #3F51B2;">
                {{ auth()->user()->name }}!</span></h2>
        <p>Mula jejak tumbesaran dan pencapaian perkembangan <span class="text-capitalize" style="color: #3F51B2;">
                <strong>{{ $child->child_name }}</strong></span>.</p>

        <div class="row">
            <!-- Growth Chart Section -->
            <!-- Include the growth chart partial -->
            @include('user.growth-chart-partial', [
                'child' => $child,
                'growthRecords' => $growthRecords,
                'refRecords' => $refRecords,
            ])

        <!-- M-CHAT Score Section -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">M-CHAT</h5>
                    <h6 class="card-title mb-3">Skor M-CHAT</h6>
                    <h2 class="display-4" style="color: #3F51B2;"><strong>{{ $latestMCHAT->score ?? '0' }}</strong></h2>

                    <span class="badge
                    @if ($latestMCHAT?->risk_level === 'RISIKO TINGGI')
                        bg-gradient-danger
                    @elseif ($latestMCHAT?->risk_level === 'RISIKO SEDERHANA')
                        bg-gradient-warning
                    @else
                        bg-gradient-success
                    @endif">
                        {{ $latestMCHAT?->risk_level ?? 'Tiada Rekod' }}
                    </span>
                    <br>
                    <a href="{{ route('mchat.index', ['childId' => $child->id]) }}" class="btn btn-primary mt-3">Ambil
                        Ujian</a>
                </div>
            </div>
            <div class="card " >
                <div class="card-body text-center">
                    <h5 class="card-title">Indeks Jisim Badan(BMI)</h5>
                    <h5 class="display-5" style="color: #3F51B2;"><strong>{{ $bmi ?? '0' }}</strong></h5>
                    
                    <span class="badge
                    @if ($bmiStatus === 'Obesiti')
                        bg-gradient-danger
                    @elseif ($bmiStatus === 'Berat Badan Berlebihan' || $bmiStatus === "Kurang Berat Badan")
                        bg-gradient-warning
                    @else
                        bg-gradient-success
                    @endif">
                    {{ $bmiStatus ?? 'Tiada Rekod'}}
                    </span>
                    <br>
                </div>
            </div>
        </div>
        
        <!-- Milestone Section -->
        <h6 class="ms-2 mb-3 text-xs font-weight-bolder opacity-6">Paparan Data Pencapaian Perkembangan </h6>
        @include('user.checklist-milestone-partial', ['milestoneProgress' => $milestoneProgress, 'child' => $child])


        <!--tips-->
        <div class="row">
            <!-- Header Card -->
            <div class="card p-2 mb-3" style="background-color: #ccdaf8; color: #fff; width: 100%; margin: auto;">
                <div class="card-header text-center" style="background-color: inherit; border: none; padding: 10px;">
                    <h5 class="card-title" style="margin: 0;">Tip-Tip</h5>
                </div>
            </div>

            <!-- Tip Cards -->
            <div class="row">
                @foreach ($tips->take(3) as $tip)
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 100%; height: 350px; margin: auto;"> <!-- Fixed card size -->
                            <div class="card-body text-center" style="padding: 15px 20px;">
                                <!-- Add a gap above the image -->
                                <div class="col-auto" style="margin-top: 10px;">
                                    <img src="{{ asset($tip->image) }}" alt="{{ $tip->tips_name }}"
                                        style="width: 100%; height: 180px; object-fit: cover; border-radius: 0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                </div>
                                <h6 class="card-title mt-3">{{ $tip->age_category }}</h6> <!-- Small margin top for title -->
                                <!-- Shift the button up using margin-top and adjust card height if needed -->
                                <a href="{{ route('tips.showTips', $tip->id) }}?childId={{ $child->id }}" class="btn btn-primary mt-4 btn-sm">Lihat</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <br>
        <!--interventions-->
        <div class="row">
            <!-- Header Card -->
            <div class="card p-2 mb-3" style="background-color: #ccdaf8; color: #fff; width: 100%; margin: auto;">
                <div class="card-header text-center" style="background-color: inherit; border: none; padding: 10px;">
                    <h5 class="card-title" style="margin: 0;">Intervensi</h5>
                </div>
            </div>

            <!-- Interventions Cards -->
            <div class="row">
                @foreach ($interventions->take(3) as $intervention)
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 100%; height: 350px; margin: auto;"> <!-- Fixed card size -->
                            <div class="card-body text-center" style="padding: 15px 20px;">
                                <!-- Add a gap above the image -->
                                <div class="col-auto" style="margin-top: 10px;">
                                    <img src="{{ asset($intervention->interventions_image) }}"
                                        style="width: 100%; height: 180px; object-fit: cover; border-radius: 0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                </div>
                                <h6 class="card-title mt-3">{{ $intervention->interventions_title }}</h6> <!-- Small margin top for title -->
                                <!-- Shift the button up using margin-top and adjust card height if needed -->
                                <a href="{{ route('interventions.showInterventions', $intervention->id) }}?childId={{ $child->id }}" class="btn btn-primary mt-4 btn-sm">Lihat</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
