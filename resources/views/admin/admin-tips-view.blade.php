@extends('layouts.user_type.auth')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-0">
                <div class="card" style="width: 100%;">
                    <div class="card-header pb-0">
                        <div class="row mb-0">
                            <div class="col-md-9">
                                <h5 class="mb-0">Kategori Umur:
                                    <strong class="text-capitalize" style="color: #3F51B2;">{{ $tipscategory->age_category }}</strong>
                                </h5>
                             </div>
                            <div class="col-md-3 text-end">
                                <a href="{{ route('tips-categories.edit', $tipscategory->id) }}"
                                    class="btn btn-primary mb-3 btn-sm">Sunting</a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="card bg-light text-dark">
                                <div class="card-body">
                                    <p>
                                        <strong>Penerangan:  </strong> {{ $tipscategory->tips_name }}
                                    </p>
                                    <p><strong>Gambar:</strong> </p>
                                    <img src="{{ asset($tipscategory->image) }}" alt="Image"
                                        style="width: 100%; height: 100%; border: 1px solid black;">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('tips-categories.index') }}" class="btn btn-secondary me-2 btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
