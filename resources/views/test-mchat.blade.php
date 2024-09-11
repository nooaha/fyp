@extends('layouts.user_type.auth')

@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-3">Ujian Saringan Perkembangan Tingkah Laku Kanak-Kanak</h5>
            <p>Arahan: Jawab semua soalan. Pilih ‘Ya’ atau ‘Tidak’ pada butang jawapan yang disediakan.</p>
        </div>
        <div class="card-body">
            <!--guna POST submit test result-->
            <form>
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
                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('test-result') }}'">Hantar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
