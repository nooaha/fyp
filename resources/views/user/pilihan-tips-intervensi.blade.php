@extends('layouts.user_type.auth')
@section('content')
    @php
        $childId = request('childId', Auth::user()->children->first()->id);
    @endphp

    <div class="container mt-5">
        <h5 class="card-title mb-3">Pilih Tips atau Intervensi</h5>
        <div class="card-header pb-0">
            <br>
            <br>
            <br>
            <div class="row justify-content-center"> <!-- Center the row if needed -->
                <!-- Tips Card -->
                <div class="col-md-4 mb-7"> <!-- Keep the card size small -->
                    <div class="card mb-5 rounded" style="height: 300px; margin: auto; border-radius: 15px; width: 100%;">
                        <!-- Rounded rectangle -->
                        <div class="card-body text-center"
                            style="padding: 15px 20px; border-radius: 15px; background-color: #ccdaf8;">
                            <div class="col-auto" style="margin-top: 10px;">
                                <img src="{{ asset('assets/img/baby.png') }}"
                                    style="width: 60%; height: auto; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            </div>
                            <h6 class="card-title mt-3" style="font-size: 16px; font-weight: 600;">Tip-tip</h6>
                            <a href="{{ route('tips.showSenaraiTips', ['childId' => $childId ?? Auth::user()->children->first()->id]) }}"
                                class="btn btn-primary btn-sm custom-btn">Lihat</a>
                        </div>
                    </div>
                </div>

                <!-- Interventions Card -->
                <div class="col-md-4"> <!-- Keep the card size small -->
                    <div class="card mb-3 rounded" style="height: 300px; margin: auto; border-radius: 15px; width: 100%;">
                        <!-- Rounded rectangle -->
                        <div class="card-body text-center"
                            style="padding: 15px 20px; border-radius: 15px; background-color: #ccdaf8;">
                            <div class="col-auto" style="margin-top: 10px;">
                                <img src="{{ asset('assets/img/autisme.png') }}"
                                    style="width: 60%; height: auto; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            </div>
                            <h6 class="card-title mt-3" style="font-size: 16px; font-weight: 600;">Intervensi</h6>
                            <a href="{{ route('interventions.showSenaraiIntervensi', ['childId' => $childId ?? Auth::user()->children->first()->id]) }}"
                                class="btn btn-primary btn-sm custom-btn">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
