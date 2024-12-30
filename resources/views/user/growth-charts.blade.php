@extends('layouts.user_type.auth')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="container">
    <div class="card">
        @php
            $years = floor($ageInMonths / 12);
            $months = $ageInMonths % 12;
        @endphp
        <div class="card-body p-4 mb-3">
            <h5><strong>Graf Tumbersaran</strong></h5>
            <p class="text-m mb-0">
                <strong> Nama Anak:
                    <span class="font-weight-bold ms-1" style="color: #3F51B2;">{{ $child->child_name }}</span><br>
                    Umur:
                    <span class="font-weight-bold ms-1" style="color: #3F51B2;">{{ $years }} tahun {{ $months }}
                        bulan</span>
                </strong>
            </p>
        </div>
    </div>
    <div class="row my-4">
        <!-- first card-->
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <!--header dalam card-->
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Graf Berat</h6>
                        </div>
                        
                    </div>
                </div>

                <!-- content @ body dalam card-->
                <div class="card-body px-2 pb-2 pt-2">
                    <div class="chart">
                        <canvas id="weightChart" class="chart-canvas" height="150px"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Graf Tinggi</h6>
                        </div>
                    </div>
                </div>

                <div class="card-body px-2 pb-2 pt-2">
                    <div class="chart">
                        <canvas id="heightChart" class="chart-canvas" height="150px"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <a href="{{ route('growth-tracking.add', ['childId' => request('childId')]) }}" style="float: right"
        class="btn btn-primary">+&nbsp;Tambah Data</a>
</div>
<br>
<br>
@endsection

@push('dashboard')

    <script>
        window.onload = function () {
            // Data from the Controller
            const growthData = @json($growthRecords);
            const refData = @json($refRecords);

            // Growth Records Data
            const ageInMonths = growthData.map(record => record.age_in_months);
            const heightData = growthData.map(record => record.height);
            const weightData = growthData.map(record => record.weight);

            // WHO Reference Data
            const refAge = refData.map(ref => ref.age_months);
            const height3SD = refData.map(ref => ref.height_3SD);
            const height2SD = refData.map(ref => ref.height_2SD);
            const height0SD = refData.map(ref => ref.height_0SD);
            const heightNeg2SD = refData.map(ref => ref.height_neg_2SD);
            const heightNeg3SD = refData.map(ref => ref.height_neg_3SD);
            const weight3SD = refData.map(ref => ref.weight_3SD);
            const weight2SD = refData.map(ref => ref.weight_2SD);
            const weight0SD = refData.map(ref => ref.weight_0SD);
            const weightNeg2SD = refData.map(ref => ref.weight_neg_2SD);
            const weightNeg3SD = refData.map(ref => ref.weight_neg_3SD);

            // Generate Unified Age List (X-axis)
            const unifiedAgeInMonths = Array.from(new Set([...ageInMonths, ...refAge])).sort((a, b) => a - b);

            // Helper Function to Align Datasets
            const alignData = (unifiedAge, originalAges, originalData) =>
                unifiedAge.map(month =>
                    originalAges.includes(month) ? originalData[originalAges.indexOf(month)] : null
                );

            // Align All Datasets
            const alignedHeight3SD = alignData(unifiedAgeInMonths, refAge, height3SD);
            const alignedHeight2SD = alignData(unifiedAgeInMonths, refAge, height2SD);
            const alignedHeight0SD = alignData(unifiedAgeInMonths, refAge, height0SD);
            const alignedHeightNeg2SD = alignData(unifiedAgeInMonths, refAge, heightNeg2SD);
            const alignedHeightNeg3SD = alignData(unifiedAgeInMonths, refAge, heightNeg3SD);
            const alignedWeight3SD = alignData(unifiedAgeInMonths, refAge, weight3SD);
            const alignedWeight2SD = alignData(unifiedAgeInMonths, refAge, weight2SD);
            const alignedWeight0SD = alignData(unifiedAgeInMonths, refAge, weight0SD);
            const alignedWeightNeg2SD = alignData(unifiedAgeInMonths, refAge, weightNeg2SD);
            const alignedWeightNeg3SD = alignData(unifiedAgeInMonths, refAge, weightNeg3SD);

            // Align Growth Data
            const alignedHeightData = alignData(unifiedAgeInMonths, ageInMonths, heightData);
            const alignedWeightData = alignData(unifiedAgeInMonths, ageInMonths, weightData);

            // Chart for Height
            new Chart(document.getElementById('heightChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: unifiedAgeInMonths, // X-axis: Unified Age in Months
                    datasets: [
                        { label: '+3SD', data: alignedHeight3SD, borderColor: 'red', borderWidth: 1, pointRadius: 1 },
                        { label: '+2SD', data: alignedHeight2SD, borderColor: 'orange', borderWidth: 1, pointRadius: 1 },
                        { label: 'Median (0SD)', data: alignedHeight0SD, borderColor: 'green', borderWidth: 1, pointRadius: 1 },
                        { label: '-2SD', data: alignedHeightNeg2SD, borderColor: 'orange', borderWidth: 1, pointRadius: 1 },
                        { label: '-3SD', data: alignedHeightNeg3SD, borderColor: 'red', borderWidth: 1, pointRadius: 1 },
                        { label: 'Tinggi Anak', data: alignedHeightData, borderColor: 'black', spanGaps: true, borderWidth: 1 }
                    ],

                },
                options: {
                    responsive: true,
                    scales: {
                        x: { title: { display: true, text: 'Umur (Bulan)' } },
                        y: { title: { display: true, text: 'Tinggi (cm)' } }
                    }
                }
            });

            // Chart for Weight
            new Chart(document.getElementById('weightChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: unifiedAgeInMonths, // X-axis: Unified Age in Months
                    datasets: [
                        { label: '+3SD', data: alignedWeight3SD, borderColor: 'red', borderWidth: 1, pointRadius: 1 },
                        { label: '+2SD', data: alignedWeight2SD, borderColor: 'orange', borderWidth: 1, pointRadius: 1 },
                        { label: 'Median (0SD)', data: alignedWeight0SD, borderColor: 'green', borderWidth: 1, pointRadius: 1 },
                        { label: '-2SD', data: alignedWeightNeg2SD, borderColor: 'orange', borderWidth: 1, pointRadius: 1 },
                        { label: '-3SD', data: alignedWeightNeg3SD, borderColor: 'red', borderWidth: 1, pointRadius: 1 },
                        { label: 'Berat Anak', data: alignedWeightData, borderColor: 'black', spanGaps: true, borderWidth: 1 }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: { title: { display: true, text: 'Umur (Bulan)' } },
                        y: { title: { display: true, text: 'Berat Badan (kg)' } }
                    }
                }
            });

        };
    </script>

@endpush