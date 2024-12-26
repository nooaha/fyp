<div class="col-md-9 mb-3">
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

            <a href="{{ route('growth-tracking.showGrowthChart', ['childId' => $child->id]) }}"
                class="btn btn-primary mt-3" style="float: right">Lihat Tumbesaran</a>

        </div>

    </div>
</div>
<script>
    window.onload = function () {
        // Pass the PHP data to JavaScript
        const growthData = @json($growthRecords);
        const refData2 = @json($refRecords);
        //console.log("Raw Reference Data:", growthData);

        
        // Growth Records Data
        const ageInMonths = growthData.map(record => record.age_in_months);
        const weightData = growthData.map(record => record.weight);

        // Reference Data
        //const refAge = refData2.map(ref => ref.age_months || 0);  // Safeguard against missing data
        const weight3SD = refData2.map(ref => ref.weight_obese_3SD || 0);
        const weight0SD = refData2.map(ref => ref.weight_normal_0SD || 0);
        const weightMin = refData2.map(ref => ref.weight_min || 0);

        

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