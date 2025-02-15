@extends('layouts.user_type.auth')
@section('content')
    @php
        $childId = request('childId', Auth::user()->children->first()->id);
    @endphp
    <div class="container">
        <h5 class="card-title mb-3">Senarai Intervensi</h5>
        <div class="row">
            @foreach ($interventions as $intervention)
                <div class="col-md-4 mb-3">
                    <div class="card " style="width: 100%; height: 100%; margin: auto;"> <!-- Fixed card size -->
                        <div class="card-body text-center" style="padding:auto;">
                            <!-- Add a gap above the image -->
                            <div class="col-auto" style="margin-top: 10px;">
                                <img src="{{ asset($intervention->interventions_image) }}"
                                    alt="{{ $intervention->interventions_title }}"
                                    style="width: 100%; height: 180px; object-fit: cover; border-radius: 0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            </div>
                            <h6 class="card-title mt-3">{{ $intervention->interventions_title }}</h6>
                            <!-- Small margin top for title -->
                            <!-- Shift the button up using margin-top and adjust card height if needed -->
                            <a href="{{ route('interventions.showInterventions', $intervention->id) }}?childId={{ request()->query('childId') }}"
                                class="btn btn-primary mt-4 btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div
@endsection
