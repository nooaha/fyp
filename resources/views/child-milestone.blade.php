@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- start letak foreach loop-->
    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title mb-3">Senarai Semak Perkembangan - 12 bulan</h6>
            <div class="row align-items-center">
                    <!-- Peratusan Pencapaian -->
                    <div class="col-md-4">
                        <p class="mb-0">Peratusan Pencapaian Perkembangan</p>
                    </div>

                    <!-- Progress Bar -->
                    <div class="col-md-5">
                        <div class="progress progress-lg">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 25px; font-weight: bold; color: black;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                            60%
                            </div>
                        </div>
                    </div>

                    <!-- Rekod Perkembangan Button -->
                    <div class="col-md-3 text-right">
                        <button class="btn btn-primary" onclick="location.href='{{ route('checklist-milestone') }}'">Rekod Perkembangan</button>
                    </div>
                </div>
        </div>
    </div>
    
    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title mb-3">Senarai Semak Perkembangan - 18 bulan</h6>
            <div class="row align-items-center">
                    <!-- Peratusan Pencapaian -->
                    <div class="col-md-4">
                        <p class="mb-0">Peratusan Pencapaian Perkembangan</p>
                    </div>

                    <!-- Progress Bar -->
                    <div class="col-md-5">
                        <div class="progress progress-lg">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 10%; height: 25px; font-weight: bold; color: black;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                            10%
                            </div>
                        </div>
                    </div>

                    <!-- Rekod Perkembangan Button -->
                    <div class="col-md-3 text-right">
                        <button class="btn btn-primary" onclick="location.href='{{ route('checklist-milestone') }}'">Rekod Perkembangan</button>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
