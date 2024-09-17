@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <h3 class="mb-3">Selamat Kembali, </h3>
    <h6 class="ms-2 mb-3 text-uppercase text-xs font-weight-bolder opacity-6">Paparan Data Pengguna</h6>
    <div class="row mb-4">
        <!--card kat dashboard 1st line-->
        <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengguna Berdaftar</p>
                    <h5 class="font-weight-bolder mb-0">
                    $53,000
                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengguna Aktif</p>
                        <h5 class="font-weight-bolder mb-0">
                        2,300
                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                        </h5>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Nyahaktif Pengguna</p>
                    <h5 class="font-weight-bolder mb-0">
                    +3,462
                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengguna Baharu</p>
                    <h5 class="font-weight-bolder mb-0">
                    $103,430
                    <span class="text-success text-sm font-weight-bolder">+5%</span>
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <h6 class="ms-2 mb-3 text-uppercase text-xs font-weight-bolder opacity-6">Paparan Data Pencapaian Perkembangan dan M-CHAT</h6>
    <div class="row mb-4">
        <!--card kat dashboard 1st line-->
        <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Kanak-kanak</p>
                    <h5 class="font-weight-bolder mb-0">
                    $53,000
                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Kadar Penilaian Perkembangan Selesai</p>
                        <h5 class="font-weight-bolder mb-0">
                        2,300
                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                        </h5>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengagihan Berisiko Tinggi M-CHAT</p>
                    <h5 class="font-weight-bolder mb-0">
                    +3,462
                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tajuk Senarai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori Umur</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--
                        <tr>
                            <td colspan="4" class="text-center mb-0 text-xs">Tiada rekod</td>
                        </tr>-->
                        
                        <tr>
                            <td class="align-middle text-xs">SP12</td>
                            <td class="align-middle text-xs">Senarai Pencapaian Perkembangan </td>
                            <td class="align-middle text-center text-xs">
                                <span class="badge bg-gradient-secondary ">12 bulan</span>
                            </td>
                            <td class="align-middle text-center text-xs">12/02/2023</td>
                        </tr>
                        <tr>
                            <td class="align-middle text-xs">SP12</td>
                            <td class="align-middle text-xs">Senarai Pencapaian Perkembangan </td>
                            <td class="align-middle text-center text-xs">
                                <span class="badge bg-gradient-secondary ">21 bulan</span>
                            </td>
                            <td class="align-middle text-center text-xs">12/02/2023</td>
                        </tr>
                        <tr>
                            <td class="align-middle text-xs">SP12</td>
                            <td class="align-middle text-xs">Senarai Pencapaian Perkembangan </td>
                            <td class="align-middle text-center text-xs">
                                <span class="badge bg-gradient-secondary ">15 bulan</span>
                            </td>
                            <td class="align-middle text-center text-xs">12/02/2023</td>
                        </tr>
                        <tr>
                            <td class="align-middle text-xs">SP12</td>
                            <td class="align-middle text-xs">Senarai Pencapaian Perkembangan </td>
                            <td class="align-middle text-center text-xs">
                                <span class="badge bg-gradient-secondary ">18 bulan</span>
                            </td>
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
    
    <h6 class="ms-2 mb-4 text-uppercase text-xs font-weight-bolder opacity-6">Paparan Data Tip dan intervensi</h6>
    <div class="card mb-3 mb-4">
        <div class="card-body">
            <h6 class="card-title mb-3">Kemas kini Senarai Tips dan Intervensi </h6>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bil.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tajuk Senarai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh</th>
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