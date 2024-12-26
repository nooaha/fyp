@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h5 class="text-m mb-3">Ujian Saringan Perkembangan Tingkah Laku Kanak-Kanak(M-CHAT)</h5>
    <div class="card">
        <div class="card-header pb-0">
            <p>Arahan: Jawab semua soalan. Pilih ‘Ya’ atau ‘Tidak’ pada butang jawapan yang disediakan.</p>
            <h6 class="mt-0">1. Bagaimana Menganalisa Senarai Semak</h6>
            <ul>
                <li>Ibubapa perlu menjawab Ya atau Tidak kepada semua soalan 1 - 23.</li>
                <li>Enam item yang di gelapkan adalah soalan yang kritikal iaitu 2, 7, 9, 13, 14, 15.</li>
            </ul>
        </div>

        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No. Soalan
                            </th>
                            <th
                                class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                Soalan Saringan
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                Jawapan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('mchat.store', ['childId' => request('childId')]) }}" method="POST">
                            @csrf
                            @foreach ($questions as $question)
                                <tr>
                                    <td class="align-middle text-center text-m" style="width: 3%;">
                                        <span>{{ $question->id }}</span>
                                    </td>
                                    <td class="align-middle text-m" style="width: 73%; white-space: normal;">
                                        <span
                                            style="{{ in_array($question->id, [2, 7, 9, 13, 14, 15]) ? 'font-weight: bold;' : '' }}">
                                            {{ $question->question }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center text-m">
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <!-- Radio button for Yes -->
                                            <input type="radio" class="btn-check" name="answers[{{ $question->id }}]"
                                                id="yes_{{ $question->id }}" value="0" autocomplete="off" required>
                                            <label class="btn btn-outline-success" for="yes_{{ $question->id }}">Ya</label>

                                            <!-- Radio button for No -->
                                            <input type="radio" class="btn-check" name="answers[{{ $question->id }}]"
                                                id="no_{{ $question->id }}" value="1" autocomplete="off" required>
                                            <label class="btn btn-outline-secondary"
                                                for="no_{{ $question->id }}">Tidak</label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('mchat.index', ['childId' => request('childId')]) }}"
                        class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary" style="float: right">Hantar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection