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
                <canvas id="weightChart" class="chart-canvas" height="160px"></canvas>
            </div>

            <a href="{{ route('growth-tracking.showGrowthChart', ['childId' => $child->id]) }}"
                class="btn btn-primary mt-3" style="float: right">Lihat Tumbesaran</a>

        </div>

    </div>
</div>
<script>
       
        window.onload = function () {
            // Data from the Controller
            const growthData = @json($growthRecords);
            const refData2 = @json($refRecords);
            console.log("Raw Reference Data:", refData2);

            
            // Growth Records Data
            const ageInMonths = growthData.map(record => record.age_in_months);
            const weightData = growthData.map(record => record.weight);

            // WHO Reference Data
            const refAge = refData2.map(ref => ref.age_months);
            const weight3SD = refData2.map(ref => ref.weight_3SD);
            const weight2SD = refData2.map(ref => ref.weight_2SD);
            const weight0SD = refData2.map(ref => ref.weight_0SD);
            const weightNeg2SD = refData2.map(ref => ref.weight_neg_2SD);
            const weightNeg3SD = refData2.map(ref => ref.weight_neg_3SD);

            // Generate Unified Age List (X-axis)
            const unifiedAgeInMonths = Array.from(new Set([...ageInMonths, ...refAge])).sort((a, b) => a - b);

            // Helper Function to Align Datasets
            const alignData = (unifiedAge, originalAges, originalData) =>
                unifiedAge.map(month =>
                    originalAges.includes(month) ? originalData[originalAges.indexOf(month)] : null
                );

            // Align All Datasets
            const alignedWeight3SD = alignData(unifiedAgeInMonths, refAge, weight3SD);
            const alignedWeight2SD = alignData(unifiedAgeInMonths, refAge, weight2SD);
            const alignedWeight0SD = alignData(unifiedAgeInMonths, refAge, weight0SD);
            const alignedWeightNeg2SD = alignData(unifiedAgeInMonths, refAge, weightNeg2SD);
            const alignedWeightNeg3SD = alignData(unifiedAgeInMonths, refAge, weightNeg3SD);

            // Align Growth Data
            const alignedWeightData = alignData(unifiedAgeInMonths, ageInMonths, weightData);

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