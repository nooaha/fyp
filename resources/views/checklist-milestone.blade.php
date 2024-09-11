@extends('layouts.user_type.auth')

@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-3">Senarai Semak Perkembangan - 12 bulan</h5>
            <p>Arahan: Pilih jawapan 'Ya' atau 'Tidak' di ruang yang berkaitan</p>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                <!-- kena letak foraeach untuk questions-->
                <!-- Checklist Questions -->
                <div class="row mb-3">
                    <div class="col-8">
                        <p>Questions kat sini</p>
                    </div>
                    <div class="col-4 text-end">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <!-- kena letak question id kat sini-->
                            <input type="radio" class="btn-check" name="question" id="yes" value="yes" autocomplete="off">
                            <label class="btn btn-outline-success" for="yes">Ya</label>

                            <input type="radio" class="btn-check" name="question" id="no" value="no" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="no">Tidak</label>
                        </div>
                    </div>
                </div>
                <!-- endforeach kena kat sini-->

                <!-- Submit Button -->
                <div class="text-end">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan Rekod</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
