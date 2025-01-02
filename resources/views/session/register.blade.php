@extends('layouts.user_type.guest')

@section('content')

<section class="min-vh-100 mt-7">
    <div class="page-header align-items-start min-vh-70 pt-5 pb-11 mx-3 border-radius-lg"
        style="background-image: url('../assets/img/fyp-family-3.jpg'); background-position:5px 40%">
        <span class="mask bg-gradient-dark opacity-6"></span> <!-- Reduced opacity -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
                    <p class="text-lead text-white">Ketahui pandangan tentang perkembangan anak anda <br> Daftar
                        sekarang!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Daftar Maklumat</h5>
                    </div>
                    <div class="card-body pt-0">
                        <form role="form text-left" method="POST" action="/register">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Nama" name="name" id="name"
                                    aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="E-mel" name="email" id="email"
                                    aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Kata laluan" name="password"
                                    id="password" aria-label="Password" aria-describedby="password-addon">
                                @error('password')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-check form-check-info text-left">
                                <input class="form-check-input" type="checkbox" name="agreement" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Saya bersetuju dengan <a href="#" class="font-weight-bolder" style="color: #3F51B2"
                                        data-bs-toggle="modal" data-bs-target="#termsModal">
                                        Terma dan Syarat
                                    </a>
                                </label>
                                @error('agreement')
                                    <p class="text-danger text-xs mt-2">Sila terima terma dan syarat.</p>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 my-4 mb-2">Daftar Masuk</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">Sudah mempunyai akaun? <a href="login"
                                    class=" font-weight-bolder" style="color: #3F51B2">Log masuk</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsModalLabel">Terma dan Syarat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>1. Pengenalan</h6>
                        <p>Dengan menggunakan sistem ini, anda setuju untuk mematuhi terma dan syarat yang diberikan.
                            Jika anda tidak setuju, sila hentikan penggunaan sistem ini.</p>

                        <h6>2. Penggunaan Sistem</h6>
                        <p>Sistem ini digunakan untuk menyimpan dan menguruskan data bayi dan ibu. Pengguna perlu
                            memastikan maklumat yang diberikan adalah tepat dan terkini.</p>

                        <h6>3. Akaun Pengguna</h6>
                        <p>Untuk menggunakan sistem, anda perlu mendaftar akaun. Anda bertanggungjawab untuk melindungi
                            maklumat akaun dan memastikan tiada orang lain yang mengaksesnya tanpa kebenaran anda.</p>

                        <h6>4. Privasi dan Perlindungan Data</h6>
                        <p>Kami menghormati privasi anda dan akan menjaga keselamatan data peribadi. Data yang dikumpul
                            hanya akan digunakan untuk tujuan sistem ini dan tidak akan dikongsi tanpa izin, kecuali
                            jika dikehendaki oleh undang-undang.</p>

                        <h6>5. Penafian</h6>
                        <p>Sistem ini disediakan "seadanya" tanpa sebarang jaminan. Kami tidak bertanggungjawab atas
                            sebarang kerugian yang timbul daripada penggunaan sistem.</p>

                        <h6>6. Perubahan Terma dan Syarat</h6>
                        <p>Kami berhak mengubah terma dan syarat pada bila-bila masa. Sebarang perubahan akan diberitahu
                            melalui sistem atau emel dan akan berkuat kuasa selepas ia disiarkan.</p>

                        <h6>7. Pelanggaran Terma</h6>
                        <p>Jika anda melanggar mana-mana terma, kami berhak untuk menggantung atau menamatkan akses anda
                            ke sistem tanpa notis.</p>

                        <h6>8. Hubungi Kami</h6>
                        <p>Jika anda mempunyai sebarang soalan mengenai terma ini, sila hubungi kami melalui saluran
                            yang disediakan dalam sistem.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection