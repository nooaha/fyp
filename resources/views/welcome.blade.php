@extends('layouts.user_type.guest')

@section('content')

<div class="container mt-8">
    <div class="page-header align-items-start min-vh-50 pt-5 mx-3 border-radius-lg" id="home"
        style="background-image: url('../assets/img/fyp-family-2.jpg');">
        <span class="mask opacity-6"></span>
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center mx-auto">
                </div>
                <div class="col-lg-5 text-center mx-auto p-4" >
                    <h2 class="text-white">Jejak, Kenalpasti, dan Berkembang Maju bersama <span
                            class="text-primary">PediPulse</span></h2>
                        <p class="lead text-white">Ketahui pandangan tentang perkembangan anak anda - Daftar sekarang!
                        </p>
                        <a href="" class="btn btn-primary">Mula Mengesan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-4" >
        <div class="card pb-3">
            <div class="card-body px-2 pb-2" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 pt-1" >
                            <h2>Tentang PediPulse</h2>
                            <p id="aboutUs" >Di PediPulse, kami percaya dalam menyokong perkembangan anak-anak pada setiap langkah.
                                Aplikasi kami yang mesra pengguna membantu anda menjejak pencapaian, membuat analisis
                                tentang perkembangan anak anda, dan mendapatkan pandangan berharga tentang pertumbuhan
                                anak anda.</p>
                            <p>Mulai hari ini untuk memberikan pandangan yang lebih jelas tentang perkembangan anak
                                anda!</p>
                        </div>
                        <div class="col-md-4 align-items-center d-flex justify-content-center">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="PediPulse Logo" class="img-fluid" style="max-height: 230px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-5 bg-light border-radius-lg" >
        <div class="container text-center pt-1">
            <h2 class="pb-3 ">Perkhidmatan Kami</h2>
            <div class="row">
                <div class="col-md-3" >
                    <i class="fas fa-chart-line fa-3x mb-3"></i>
                    <h5>Carta Tumbesaran</h5>
                    <p>Jejak dan pantau perkembangan anak anda dengan carta tumbesaran kami.</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-baby fa-3x mb-3"></i>
                    <h5>Pemantauan Perkembangan</h5>
                    <p>Dapatkan pandangan perkembangan berdasarkan pencapaian anak anda.</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-clipboard-check fa-3x mb-3"></i>
                    <h5>Ujian Saringan M-CHAT</h5>
                    <p>Lakukan ujian saringan awal untuk Autism Spectrum Disorder (ASD).</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-heart fa-3x mb-3"></i>
                    <h5>Tips dan Intervensi</h5>
                    <p>Ketahui tips pengurusan perkembangan anak anda dan intervensi</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-4" id="contactUs">
        <div class="card pb-3">
            <div class="card-body px-2 pb-2">
                <div class="container">
                    <h2 class="text-center">Hubungi Kami</h2>
                    <div class="text-center">
                        <p><i class="fas fa-envelope"></i> pedi@pedipulse.com</p>
                        <p><i class="fas fa-phone"></i> 012-3456789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
