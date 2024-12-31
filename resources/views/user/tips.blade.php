@extends('layouts.user_type.auth')

@section('content')
    @php
        $childId = request()->query('childId');
    @endphp
    <div class="container">
            <h5 class="card-title mb-3">Tip dan Panduan</h5>
        <div class="card mb-3 ">
            <div class="card-body">
                <div class="container">
                    <h4 class="mb-0">Kategori Umur:
                        <strong class="text-capitalize" style="color: #3F51B2;">{{ $tips->age_category }}</strong>
                    </h4>
                    <br>
                    <p>{{ $tips->tips_name }}</p>
                    <div>
                        <img src="{{ asset($tips->image) }}" alt="Image"
                            style="width: 100%; height: 100%; border: 1px solid black;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
