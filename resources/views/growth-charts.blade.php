@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <div class="row my-4">
        <!-- first card-->
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <!--header dalam card-->
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Graf Tumbesaran - Berat</h6>
                            <p class="text-sm mb-0">
                            <span class="font-weight-bold ms-1">Berat</span>
                            </p>
                        </div>
                        <!-- menu dotted 3-->
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <!-- Dynamic age range selection -->
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"  onclick="updateWeightChart('all')">Semua Umur</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"  onclick="updateWeightChart('24-36')">2-3 Tahun</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;" onclick="updateWeightChart('36-48')">3-4 Tahun</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;" onclick="updateWeightChart('48-60')">4-5 Tahun</a></li>
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
                            <h6>Graf Tumbesaran - Tinggi</h6>
                            <p class="text-sm mb-0"></p>
                            <span class="font-weight-bold ms-1">Tinggi</span>
                            </p>
                        </div>
                        <!-- menu dotted 3-->
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <!-- Dynamic age range selection -->
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"  onclick="updateChart('all')">Semua Umur</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;"  onclick="updateChart('24-36')">2-3 Tahun</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;" onclick="updateChart('36-48')">3-4 Tahun</a></li>
                                    <li><a class="dropdown-item border-radius-md" style="cursor: pointer;" onclick="updateChart('48-60')">4-5 Tahun</a></li>
                                </ul>
                            </div>
                        </div>
                        

                    </div>
                </div>

                <div class="card-body px-2 pb-2 pt-2">
                    <div class="chart">
                        <canvas id="growthChart" class="chart-canvas" height="150px"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- error in location need (controller)-->
    <button type="button" class="btn btn-primary btn-lg" style="float: right" onclick="location.href='{{ route('add-growth') }}'">Tambah Data</button>

</div>
<br>
<br>
@endsection

@push('dashboard')
<script>
    window.onload = function() {
    
    const ctxWeight = document.getElementById('weightChart').getContext('2d');

    const fullWeightData = {
        labels: Array.from({ length: 37 }, (_, i) => 24 + i),
        datasets: [
            {
                label: 'Obesiti (+3SD)',
                data: [19, 19.3, 19.5, 19.8, 20, 20.3, 20.6, 21, 21.3, 21.6, 21.9, 22.2, 22.5, 22.8, 23, 23.3, 23.5, 23.8, 24, 24.3, 24.5, 24.8, 25, 25.3, 25.6, 25.8, 26, 26.3, 26.5, 26.8, 27, 27.2, 27.5, 27.8, 28, 28.2, 28.5],
                borderColor: 'red',
                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                fill: '+1', // Fill to the next dataset above
            },
            {
                label: 'Top of Chart',
                data: new Array(37).fill(30), // A straight line at the top (Y = 30)
                borderColor: 'transparent', // Don't show this line
                backgroundColor: 'rgba(255, 0, 0, 0.2)', // This will act as the "ceiling" above the +3SD line
                fill: false, // Prevents filling this dataset itself
            },
            {
                label: 'Normal (0 SD)',
                data: [12, 12.2, 12.4, 12.6, 12.8, 13, 13.2, 13.4, 13.6, 13.8, 14, 14.2, 14.4, 14.6, 14.8, 15, 15.2, 15.4, 15.6, 15.8, 16, 16.2, 16.4, 16.6, 16.8, 17, 17.2, 17.4, 17.6, 17.8, 18, 18.2, 18.4, 18.6, 18.8, 19, 19.2],
                borderColor: 'green',
                backgroundColor: 'rgba(0, 255, 0, 0.2)',
                fill: false,
            },
            {
                label: 'Kurang Berat Badan (-3SD)',
                data: [8.8, 9, 9.2, 9.4, 9.6, 9.8, 10, 10.2, 10.4, 10.6, 10.8, 11, 11.2, 11.4, 11.6, 11.8, 12, 12.2, 12.4, 12.6, 12.8, 13, 13.2, 13.4, 13.6, 13.8, 14, 14.2, 14.4, 14.6, 14.8, 15, 15.2, 15.4, 15.6, 15.8, 16],
                borderColor: 'yellow',
                backgroundColor: 'rgba(255, 255, 0, 0.2)',
                fill: true,
            },
        ]
    };

    const myWeightChart = new Chart(ctxWeight, {
        type: 'line',
        data: fullWeightData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false, // We want the Y-axis to start from the lower weight values
                    min: 7,  // Set minimum Y-axis value as 7kg
                    max: 30, // Set maximum Y-axis value as 30kg
                    title: {
                        display: true,
                        text: 'Berat Badan (kg)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Umur (Bulan)'
                    },
                    ticks: {
                        stepSize: 2 // Display labels for every 2 months
                    }
                }
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

    window.updateWeightChart = function (ageRange) {
    console.log('Weight chart update triggered for:', ageRange);
    let filteredWeightData;
    switch (ageRange) {
        case '24-36': // 24 to 36 months
            filteredWeightData = {
                labels: Array.from({ length: 13 }, (_, i) => 24 + i), // Months 24 to 36
                // Months from 24 to 36
                datasets: [
                    {
                        label: 'Obesiti (+3SD)',
                        data: [19, 19.3, 19.5, 19.8, 20, 20.3, 20.6, 21, 21.3, 21.6, 21.9, 22.2, 22.5],
                        borderColor: 'red',
                        backgroundColor: 'rgba(255, 0, 0, 0.2)',
                        fill: '+1',
                    },
                    {
                        label: 'Top of Chart',
                        data: new Array(37).fill(30), // A straight line at the top (Y = 30)
                        borderColor: 'transparent', // Don't show this line
                        backgroundColor: 'rgba(255, 0, 0, 0.2)', // This will act as the "ceiling" above the +3SD line
                        fill: false, // Prevents filling this dataset itself
                    },
                    {
                        label: 'Normal (0 SD)',
                        data: [12, 12.2, 12.4, 12.6, 12.8, 13, 13.2, 13.4, 13.6, 13.8, 14, 14.2, 14.4],
                        borderColor: 'green',
                        backgroundColor: 'rgba(0, 255, 0, 0.2)',
                        fill: false,
                    },
                    {
                        label: 'Kurang Berat Badan (-3SD)',
                        data: [8.8, 9, 9.2, 9.4, 9.6, 9.8, 10, 10.2, 10.4, 10.6, 10.8, 11, 11.2],
                        borderColor: 'yellow',
                        backgroundColor: 'rgba(255, 255, 0, 0.2)',
                        fill: true,
                    },
                ]
            };
            break;
        case '36-48': // 36 to 48 months
            filteredWeightData = {
                labels: Array.from({ length: 13 }, (_, i) => 36 + i), // Months from 36 to 48
                datasets: [
                    {
                        label: 'Obesiti (+3SD)',
                        data: [22.5,22.8, 23, 23.3, 23.5, 23.8, 24, 24.3, 24.5, 24.8, 25, 25.3, 25.6],
                        borderColor: 'red',
                        backgroundColor: 'rgba(255, 0, 0, 0.2)',
                        fill: '+1',
                    },
                    {
                        label: 'Top of Chart',
                        data: new Array(37).fill(30), // A straight line at the top (Y = 30)
                        borderColor: 'transparent', // Don't show this line
                        backgroundColor: 'rgba(255, 0, 0, 0.2)', // This will act as the "ceiling" above the +3SD line
                        fill: false, // Prevents filling this dataset itself
                    },
                    {
                        label: 'Normal (0 SD)',
                        data: [14.4, 14.6, 14.8, 15, 15.2, 15.4, 15.6, 15.8, 16, 16.2, 16.4, 16.6, 16.8],
                        borderColor: 'green',
                        backgroundColor: 'rgba(0, 255, 0, 0.2)',
                        fill: false,
                    },
                    {
                        label: 'Kurang Berat Badan (-3SD)',
                        data: [11.2, 11.4, 11.6, 11.8, 12, 12.2, 12.4, 12.6, 12.8, 13, 13.2, 13.4, 13.6],
                        borderColor: 'yellow',
                        backgroundColor: 'rgba(255, 255, 0, 0.2)',
                        fill: true,
                    },
                ]
            };
            break;
        case '48-60': // 48 to 60 months
            filteredWeightData = {
                labels: Array.from({ length: 13 }, (_, i) => 48 + i), // Months from 48 to 60
                datasets: [
                    {
                        label: 'Obesiti (+3SD)',
                        data: [25.6, 25.8, 26, 26.3, 26.5, 26.8, 27, 27.2, 27.5, 27.8, 28, 28.2, 28.5],
                        borderColor: 'red',
                        backgroundColor: 'rgba(255, 0, 0, 0.2)',
                        fill: '+1',
                    },
                    {
                        label: 'Top of Chart',
                        data: new Array(37).fill(30), // A straight line at the top (Y = 30)
                        borderColor: 'transparent', // Don't show this line
                        backgroundColor: 'rgba(255, 0, 0, 0.2)', // This will act as the "ceiling" above the +3SD line
                        fill: false, // Prevents filling this dataset itself
                    },
                    {
                        label: 'Normal (0 SD)',
                        data:[16.8, 17, 17.2, 17.4, 17.6, 17.8, 18, 18.2, 18.4, 18.6, 18.8, 19, 19.2],
                        borderColor: 'green',
                        backgroundColor: 'rgba(0, 255, 0, 0.2)',
                        fill: false,
                    },
                    {
                        label: 'Berat Badan Berlebihan (-3SD)',
                        data: [13.6, 13.8, 14, 14.2, 14.4, 14.6, 14.8, 15, 15.2, 15.4, 15.6, 15.8, 16],
                        borderColor: 'yellow',
                        backgroundColor: 'rgba(255, 255, 0, 0.2)',
                        fill: true,
                    },
                ]
            };
            break;
        default:
            filteredWeightData = fullWeightData;
            break;
    }

    // Update the chart with the new data
    myWeightChart.data = filteredWeightData;
    myWeightChart.update();
    console.log('Weight chart updated');
};

        
    const ctxHeight = document.getElementById('growthChart').getContext('2d');

// Full data covering 24 to 60 months (2 to 5 years)
    const fullDataHeight = {
        labels: Array.from({ length: 37 }, (_, i) => 24 + i), // Generates array [24, 25, 26, ..., 60]
        datasets: [
            {
                label: 'Normal (+3SD)',
                data: [92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128],
                borderColor: 'green',
                backgroundColor: 'rgba(0, 255, 0, 0.2)',
                fill: false,
            },
            {
                label: 'Normal (0 SD)',
                data: [85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121],
                borderColor: 'green',
                backgroundColor: 'rgba(0, 255, 0, 0.2)',
                fill: false,
            },
            {
                label: 'Bantut (-3SD)',
                data: [78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114],
                borderColor: 'yellow',
                backgroundColor: 'rgba(255, 255, 0, 0.2)',
                fill: true,
            },
        ]
    };

    const myChart = new Chart(ctxHeight, {
        type: 'line',
        data: fullDataHeight,
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Umur (Bulan)',
                    },
                },
                y: {
                    beginAtZero: false,
                    title: {
                        display: true,
                        text: 'Tinggi (cm)',
                    },
                    min: 70,
                    max: 130,
                    ticks: {
                        stepSize: 10,
                    },
                },
            },
        },
    });

    // Function to update the chart based on age range (in months)
    window.updateChart = function (ageRange) {
        console.log('Chart update triggered for:', ageRange);
        let filteredData;
        switch (ageRange) {
            case '24-36': // 2 to 3 years
                filteredData = {
                    labels: Array.from({ length: 13 }, (_, i) => 24 + i), // Months 24 to 36
                    datasets: [
                        {
                            label: 'Normal (+3SD)',
                            data: [92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104],
                            borderColor: 'green',
                            backgroundColor: 'rgba(0, 255, 0, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Normal (0 SD)',
                            data: [85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97],
                            borderColor: 'green',
                            backgroundColor: 'rgba(0, 255, 0, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Bantut (-3SD)',
                            data: [78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90],
                            borderColor: 'yellow',
                            backgroundColor: 'rgba(255, 255, 0, 0.2)',
                            fill: true,
                        },
                    ]
                };
                break;
            case '36-48': // 3 to 4 years
                filteredData = {
                    labels: Array.from({ length: 13 }, (_, i) => 36 + i), // Months 36 to 48
                    datasets: [
                        {
                            label: 'Normal (+3SD)',
                            data: [104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116],
                            borderColor: 'green',
                            backgroundColor: 'rgba(0, 255, 0, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Normal (0 SD)',
                            data: [97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109],
                            borderColor: 'green',
                            backgroundColor: 'rgba(0, 255, 0, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Bantut (-3SD)',
                            data: [90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102],
                            borderColor: 'yellow',
                            backgroundColor: 'rgba(255, 255, 0, 0.2)',
                            fill: true,
                        },
                    ]
                };
                break;
            case '48-60': // 4 to 5 years
                filteredData = {
                    labels: Array.from({ length: 13 }, (_, i) => 48 + i), // Months 48 to 60
                    datasets: [
                        {
                            label: 'Normal (+3SD)',
                            data: [116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128],
                            borderColor: 'green',
                            backgroundColor: 'rgba(0, 255, 0, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Normal (0 SD)',
                            data: [109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121],
                            borderColor: 'green',
                            backgroundColor: 'rgba(0, 255, 0, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Bantut (-3SD)',
                            data: [102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114],
                            borderColor: 'yellow',
                            backgroundColor: 'rgba(255, 255, 0, 0.2)',
                            fill: true,
                        },
                    ]
                };
                break;
            default:
                filteredData = fullDataHeight;
                break;
        }

        // Update the chart with the new data
        myChart.data = filteredData;
        myChart.update();
        console.log('Chart updated');
    };


};
</script>
@endpush
