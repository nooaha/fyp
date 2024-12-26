@extends('layouts.user_type.auth')

@section('content')

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
                        <!-- menu dotted 3-->
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <!-- Dynamic age range selection -->
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"
                                            onclick="updateWeightChart('all')">Semua Umur</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"
                                            onclick="updateWeightChart('24-36')">2-3 Tahun</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"
                                            onclick="updateWeightChart('36-48')">3-4 Tahun</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"
                                            onclick="updateWeightChart('48-60')">4-5 Tahun</a></li>
                                </ul>
                            </div>
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
                        <!-- menu dotted 3-->
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <!-- Dynamic age range selection -->
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"
                                            onclick="updateChart('all')">Semua Umur</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"
                                            onclick="updateChart('24-36')">2-3 Tahun</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"
                                            onclick="updateChart('36-48')">3-4 Tahun</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"
                                            onclick="updateChart('48-60')">4-5 Tahun</a></li>
                                </ul>
                            </div>
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
    <!-- error in location need (controller)
    <button type="button" class="btn btn-primary" style="float: right" onclick="location.href='{{ route('growth-tracking.add',['childId' => request('childId')]) }}'>Tambah Data</button>-->
    <a href="{{ route('growth-tracking.add', ['childId' => request('childId')]) }}" style="float: right"
        class="btn btn-primary">+&nbsp;Tambah Data</a>
</div>
<br>
<br>
@endsection

@push('dashboard')

    <script>
        window.onload = function () {
            const growthData = @json($growthRecords);
            const refData = @json($refRecords);

            // Growth Records Data
            const ageInMonths = growthData.map(record => record.age_in_months);
            const heightData = growthData.map(record => record.height);
            const weightData = growthData.map(record => record.weight);

            // Reference Data
            //const refAge = refData.map(ref => ref.age_months);
            const height3SD = refData.map(ref => ref.height3SD);
            const height0SD = refData.map(ref => ref.height0SD);
            const heightMin = refData.map(ref => ref.heightMin);
            const weight3SD = refData.map(ref => ref.weight3SD);
            const weight0SD = refData.map(ref => ref.weight0SD);
            const weightMin = refData.map(ref => ref.weightMin);

            // Chart for Height
            new Chart(document.getElementById('heightChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: ageInMonths, // X-axis: Age in months
                    datasets: [
                        { label: 'Normal (+3SD)', data: height3SD, borderColor: 'green', fill: false },
                        { label: 'Normal (0SD)', data: height0SD, borderColor: 'green', backgroundColor: 'rgba(0, 255, 0, 0.2)', fill: "false" },
                        { label: 'Bantut (-3SD)', data: heightMin, borderColor: 'yellow', backgroundColor: 'rgba(255, 255, 0, 0.2)', fill: true },
                        { label: 'Tinggi Anak', data: heightData, borderColor: 'blue', fill: false }
                    ]
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
                    labels: ageInMonths, // X-axis: Age in months
                    datasets: [
                        { label: 'Top of Chart', data: new Array(37).fill(30), borderColor: 'transparent', backgroundColor: 'rgba(255, 0, 0, 0.2)', fill: false },
                        { label: 'Obesiti (+3SD)', data: weight3SD, borderColor: 'red', backgroundColor: 'rgba(255, 0, 0, 0.2)', fill: '-1' },
                        { label: 'Normal (0SD)', data: weight0SD, borderColor: 'green', fill: false },
                        { label: 'Kurang Berat Badan (-3SD)', data: weightMin, borderColor: 'yellow', backgroundColor: 'rgba(255, 255, 0, 0.2)', fill: true },
                        { label: 'Berat Anak', data: weightData, borderColor: 'purple', fill: false }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: { title: { display: true, text: 'Umur (Bulan)' } },
                        y: { title: { display: true, text: 'Berat Badan (kg)' } }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                // Filter out specific legends wanted to hide
                                filter: function (legendItem, data) {
                                    // Hide the legend for 'Top pf chart'
                                    return legendItem.text !== 'Top of Chart';
                                }
                            }
                        }
                    }
                }
            });
        };
    </script>

@endpush