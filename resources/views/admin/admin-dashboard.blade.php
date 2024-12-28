@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <h3 class="mb-3">Selamat Kembali, <span style="color: #3F51B2;">{{ Auth::user()->name }}!</span></h3>
    <h6 class="ms-2 mb-3 text-uppercase text-xs font-weight-bolder opacity-6">Paparan Data Pengguna</h6>
    <div class="row mb-4">
        <!--card kat dashboard 1st line-->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengguna Berdaftar</p>
                                <h5 class="font-weight-bolder mb-0">
                                {{ $registeredUsers }}
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-users ps-2 pe-2 text-center text-dark "
                                    aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--c
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengguna Aktif</p>
                                <h5 class="font-weight-bolder mb-0">
                                    $activeUsers
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i style="font-size: 1rem;"
                                    class="fas fa-lg fa-user-check ps-2 pe-2 text-center text-dark "
                                    aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>ard kat dashboard 1st line-->

        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengguna Baharu</p>
                                <h5 class="font-weight-bolder mb-0">
                                    
                                    <span class="text-success font-weight-bolder">{{$newUsers}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i style="font-size: 1rem;"
                                    class="fas fa-lg fa-user-plus ps-2 pe-2 text-center text-dark "
                                    aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h6 class="ms-2 mb-3 text-uppercase text-xs font-weight-bolder opacity-6">Paparan Data Pencapaian Perkembangan dan
        M-CHAT</h6>
    <div class="row mb-4">
        <!--card kat dashboard 1st line-->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Kanak-kanak</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{$totalChildren}}
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-child ps-2 pe-2 text-center text-dark "
                                    aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Kadar Penilaian Perkembangan
                                    Selesai</p>
                                <h5 class="font-weight-bolder mb-0">
                                    
                                    <span class="text-success font-weight-bolder">{{$completionRate}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i style="font-size: 1rem;"
                                    class="fas fa-lg fa-list-check ps-2 pe-2 text-center text-dark "
                                    aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengagihan Berisiko Tinggi
                                    M-CHAT</p>
                                <h5 class="font-weight-bolder mb-0">
                                    
                                    <span class="text-danger font-weight-bolder">{{$highRiskMCHAT}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i style="font-size: 1rem;"
                                    class="fas fa-lg fa-circle-exclamation ps-2 pe-2 text-center text-dark "
                                    aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <h6 class="card-title mb-3">Kemas kini Senarai Pencapaian Perkembangan </h6>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LID.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tajuk
                                Senarai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Kategori Umur</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Tarikh akhir kemaskini</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if ($checklists->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center mb-0 text-xs">Tiada rekod Senarai Pencapaian Perkembangan</td>
                        </tr>
                    @else
                        @foreach ($checklists as $checklist)
                            <tr>
                                <td class="align-middle text-xs">
                                    <span>{{ $checklist->id }}</span>
                                </td>
                                <td class="align-middle text-xs">
                                    <span>{{ $checklist->title}}</span>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <span class="badge bg-gradient-secondary ">{{ $checklist->age_category }} bulan</span>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <span>{{ $checklist->updated_at}}</span>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="text-end mt-2">
                <a href="{{ route('milestone-checklists.index') }}" class="btn btn-primary mb-0">Kemas kini</a>
            </div>
        </div>
    </div>

    <h6 class="ms-2 mb-4 text-uppercase text-xs font-weight-bolder opacity-6">Paparan Data Tip dan intervensi</h6>
    <div class="card mb-3 mb-4">
        <div class="card-body">
            <h6 class="card-title mb-3">Kemas kini Senarai Tips dan Intervensi </h6>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bil.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tajuk
                                Senarai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Tarikh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--
                        <tr>
                            <td colspan="4" class="text-center mb-0 text-xs">Tiada rekod</td>
                        </tr>-->

                        <tr>
                            <td class="align-middle text-xs">1</td>
                            <td class="align-middle text-xs">Senarai Tips </td>
                            <td class="align-middle text-center text-xs">12/02/2023</td>
                        </tr>
                        <tr>
                            <td class="align-middle text-xs">2</td>
                            <td class="align-middle text-xs">Senarai Intervensi</td>
                            <td class="align-middle text-center text-xs">12/02/2023</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-end mt-2">
                <a href="{{ route('admin-tips-interventions') }}" class="btn btn-primary mb-0">Kemas kini</a>
            </div>
        </div>
    </div>
</div>
@endsection