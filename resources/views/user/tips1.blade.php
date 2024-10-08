@extends('layouts.user_type.auth')

@section('content')

<!--start tips-->
<div style="background-color: #90C9E9; padding: 10px; margin-top: 10px; text-align: center; border-radius: 20px;">
    <h5>Tips</h5>
</div>
<br>

<div class="card-header pb-0">

        <div class="mb-0 text-center font-weight-bold" style="width: 100%;">
            <br>
            <h6>Pemakanan bayi dari 6 bulan hingga 6 tahun</h6>
        </div>
        <br>

        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="https://lumiere-a.akamaihd.net/v1/images/gallery_princess_rapunzel_4_2832aa5a.jpeg"
                                     style="width: 20%; height: auto; margin-right: 10%; margin-left: 10%;" alt="Rapunzel Image">
                                <p class="text-xs font-weight-bold mb-0">Admin</p>
                              </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="https://lumiere-a.akamaihd.net/v1/images/gallery_princess_rapunzel_4_2832aa5a.jpeg"
                                     style="width: 20%; height: auto; margin-right: 10%; margin-left: 10%;" alt="Rapunzel Image">
                                <p class="text-xs font-weight-bold mb-0">Admin</p>
                              </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="https://lumiere-a.akamaihd.net/v1/images/gallery_princess_rapunzel_4_2832aa5a.jpeg"
                                     style="width: 20%; height: auto; margin-right: 10%; margin-left: 10%;" alt="Rapunzel Image">
                                <p class="text-xs font-weight-bold mb-0">Admin</p>
                              </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
<br><br>
<!-- start button kembali-->
    <div class="d-flex justify-content-center text-center">
        <button type="button" class="btn btn-secondary btn-sm" onclick="window.location.href='/tips-dan-intervensi'">Kembali</button>
    </div>
<!-- end button kembali-->
</div>

@endsection
