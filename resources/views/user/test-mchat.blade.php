@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h5 class="text-m mb-3">Ujian Saringan Perkembangan Tingkah Laku Kanak-Kanak(M-CHAT)</h5>
    <div class="card">
        <div class="card-header pb-0">
            <p>Arahan: Jawab semua soalan. Pilih ‘Ya’ atau ‘Tidak’ pada butang jawapan yang disediakan.</p>
        </div>
        <div class="card-body pt-1">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No. Soalan
                            </th>
                            <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Soalan
                                Saringan</th>
                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                Jawapan</th>
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
                                        <span>{{ $question->question }}</span>
                                    </td>
                                    <td class="align-middle text-center text-m ">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="0" required> Ya
                                        <input type="radio" name="answers[{{ $question->id }}]" value="1" required> Tidak
                                    </td>

                                </tr>
                            @endforeach
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-end">
                        <a href="{{ route('mchat.index', ['childId' => request('childId')]) }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary" style="float: right">Hantar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection