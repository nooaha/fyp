@extends('layouts.user_type.guest')

@section('content')

<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder" style="color: #3F51B2;">Selamat Kembali</h3>
                <p class="mb-0">Cipta akauan baharu<br></p>
                <p class="mb-0">ATAU Log masuk dengan memasukkan maklumat berikut</p>
                <!--<p class="mb-0">Email <b>admin@softui.com</b></p>
                    <p class="mb-0">Password <b>secret</b></p>-->
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="parent-tab" data-bs-toggle="tab" data-bs-target="#parent"
                      type="button" role="tab" aria-controls="parent" aria-selected="true">Log Masuk Pengguna</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button"
                      role="tab" aria-controls="admin" aria-selected="false">Log Masuk Admin</button>
                  </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active mt-2" id="parent" role="tabpanel" aria-labelledby="parent-tab">
                    <form role="form" method="POST" action="/session">
                      @csrf
                      <input type="hidden" name="user_type" value="parent">
                      <label>E-mel</label>
                      <div class="mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mel"
                          aria-label="email" aria-describedby="email-addon">
                        @error('email')
              <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
                      </div>
                      <label>Kata Laluan</label>
                      <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="password"
                          placeholder="Kata laluan" aria-label="Password" aria-describedby="password-addon">
                        @error('password')
              <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
                      </div>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                        <label class="form-check-label" for="rememberMe">Simpan log masuk saya</label>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100 mt-4 mb-0">Log Masuk</button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade mt-2" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                    <form role="form" method="POST" action="/session">
                      @csrf
                      <input type="hidden" name="user_type" value="admin">
                      <label>Nama pengguna</label>
                      <div class="mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Nama pengguna"
                          aria-label="username" aria-describedby="username-addon">
                        @error('username')
              <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
                      </div>
                      <label>Kata Laluan</label>
                      <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="password"
                          placeholder="Kata Laluan" aria-label="Password" aria-describedby="password-addon">
                        @error('password')
              <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
                      </div>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                        <label class="form-check-label" for="rememberMe">Simpan log masuk saya</label>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100 mt-4 mb-0">Log Masuk</button>
                      </div>
                    </form>
                  </div>
                </div>


              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <small class="text-muted">Lupa kata laluan? Set semula kata laluan
                  <a href="/login/forgot-password" class="font-weight-bold" style="color: #3F51B2;">di sini</a>
                </small>
                <p class="mb-4 text-sm mx-auto">
                  Tidak mempunyai akaun?
                  <a href="register" class="font-weight-bold" style="color: #3F51B2;">Daftar Masuk</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n9"
                style="background-image: url('../assets/img/fyp-family-2.jpg');"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection