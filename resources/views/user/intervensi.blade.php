@extends('layouts.user_type.auth')

@section('content')
    @php
        $childId = request()->query('childId');
    @endphp
    <div class="container">
        <h5 class="card-title mb-3">Intervensi dan Panduan</h5>
        <div class="card mb-3 ">
            <div class="card-body">
                <div class="container">
                    <h4 class="mb-0">Tajuk:
                        <strong class="text-capitalize"
                            style="color: #3F51B2;">{{ $interventions->interventions_title }}</strong>
                    </h4>
                    <br>
                    <p>
                        <strong>Rujukan:
                            @if (!empty($interventions->interventions_reference))
                                <a href="{{ $interventions->interventions_reference }}" target="_blank"
                                    rel="noopener noreferrer" style="color: #3F51B2; text-decoration: underline;"
                                    onmouseover="this.style.color='#608BC1'" onmouseout="this.style.color='#3F51B2'">
                                    {{ $interventions->interventions_reference }}
                                </a>
                            @else
                                No reference provided.
                            @endif
                        </strong>
                    </p>
                    <p>{{ $interventions->interventions_explain }}</p>

                    <div>
                        <img src="{{ asset($interventions->interventions_image) }}" alt="Image"
                            style="width: 100%; height: 100%; border: 1px solid black;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
