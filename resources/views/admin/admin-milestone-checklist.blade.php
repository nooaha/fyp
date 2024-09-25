@extends('layouts.user_type.auth')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-0">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row mb-0">
                        <div class="col-md-9">
                            <h6 class="mb-0">Kemaskini Senarai Perkembangan</h6>
                        </div>
                        <div class="col-md-3 text-end">
                            <a href="{{ route('milestone-checklists.create') }}" class="btn btn-primary mb-3">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <!-- Foreach loop through all milestone checklists -->
                            @foreach ($checklists as $checklist)
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <span class="text-dark font-weight-bold ms-sm-2">{{ $checklist->title }} - {{ $checklist->age_category }} bulan</span>
                                    <span class="text-muted">{{ $checklist->description }}</span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('milestone-checklists.destroy', $checklist->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $checklist->id }}').submit();">
                                        <i class="far fa-trash-alt me-2"></i>Delete
                                    </a>
                                    <form id="delete-form-{{ $checklist->id }}" action="{{ route('milestone-checklists.destroy', $checklist->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('milestone-checklists.edit', $checklist->id) }}">
                                        <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit
                                    </a>
                                </div>
                            </li>
                            @endforeach
                            <!-- End of Foreach loop -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
