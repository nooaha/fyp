@extends('layouts.user_type.auth')

@section('content')

<!--start tips-->
<div style="background-color: #90C9E9; padding: 10px; margin-top: 10px; text-align: center; border-radius: 20px;">
    <h5>Tips</h5>
</div>
<br>

<div class="row">
    <!--card kat dashboard 1st line-->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card" style="position: relative;">
            <div class="card-body p-3" style="padding-bottom: 60px;">
                <div class="row">
                    <div class="col-12"> <!-- Change col-8 to col-12 to use full width -->
                        <div class="numbers" style="text-align: center;">
                            <img src="https://static.cdntap.com/tap-assets-prod/wp-content/uploads/sites/6/2023/09/Collage-Maker-08-Sep-2023-11-32-AM-7554.jpg?width=700&quality=95"
                                 style="width: 100%; height: auto; display: block; margin: 0 auto;" alt="Rapunzel Image">
                            <br>
                            <h5 class="text-sm mb-0 text-capitalize font-weight-bold">
                                Pemakanan bayi dari 6 bulan hingga 6 tahun
                            </h5>
                        </div>
                    </div>
                </div>
                <br><br>
<!-- button -->
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary btn-sm mb-0" onclick="window.location.href='/tips1'">Lihat</button>
</div>
<!-- end button-->
            </div>
        </div>
    </div>
<!--2nd column-->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Users</p>
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
<!--3rd column-->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
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
<!--4th column-->
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
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
<!--end tips-->

<br>

<!--start intervention-->
<div style="background-color: #90C9E9; padding: 10px; margin-top: 10px; text-align: center; border-radius: 20px;">
    <h5>Intervensi</h5>
</div>
<br>

<div class="row">
    <!--card kat dashboard 1st line-->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card" style="position: relative;">
            <div class="card-body p-3" style="padding-bottom: 60px;">
                <div class="row">
                    <div class="col-12"> <!-- Change col-8 to col-12 to use full width -->
                        <div class="numbers" style="text-align: center;">
                            <img src="https://static.cdntap.com/tap-assets-prod/wp-content/uploads/sites/6/2023/09/Collage-Maker-08-Sep-2023-11-32-AM-7554.jpg?width=700&quality=95"
                                 style="width: 100%; height: auto; display: block; margin: 0 auto;" alt="Rapunzel Image">
                            <br>
                            <h5 class="text-sm mb-0 text-capitalize font-weight-bold">
                                Sentuhan
                            </h5>
                        </div>
                    </div>
                </div>
                <br><br>
<!-- button -->
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary btn-sm mb-0" onclick="window.location.href='/interventions1'">Lihat</button>
</div>
<!-- end button-->
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Users</p>
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
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
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
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
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
<!--end interventions-->

@endsection

