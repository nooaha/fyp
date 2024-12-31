@extends('layouts.user_type.auth')
@section('content')
    @php
        $childId = request('childId', Auth::user()->children->first()->id);
    @endphp

    <div class="container">
        <h5 class="card-title mb-3">Senarai Tip-tip</h5>
        <div class="row">
            @foreach ($tips as $tip)
                <div class="col-md-4">
                    <div class="card mb-3" style="width: 100%; height: 350px; margin: auto;"> <!-- Fixed card size -->
                        <div class="card-body text-center" style="padding: 15px 20px;">
                            <!-- Add a gap above the image -->
                            <div class="col-auto" style="margin-top: 10px;">
                                <img src="{{ asset($tip->image) }}" alt="{{ $tip->tips_name }}"
                                    style="width: 100%; height: 180px; object-fit: cover; border-radius: 0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            </div>
                            <h6 class="card-title mt-3">{{ $tip->age_category }}</h6> <!-- Small margin top for title -->
                            <!-- Shift the button up using margin-top and adjust card height if needed -->
                            <a href="{{ route('tips.showTips', $tip->id) }}?childId={{ request()->query('childId') }}"
                                class="btn btn-primary mt-4 btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
