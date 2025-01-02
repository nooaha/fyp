@extends('layouts.user_type.auth')

@section('content')
<div class="card">
    <div class="container">
        <br>
        <h5>Edit Maklumat {{ $user->name }}</h5>
        <br>
        <div class="card-body">

            <form method="POST" action="{{ route('user-details.editUserDetails', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-control-label">Nama</label>
                    <input class="form-control" name="name" value="{{ $user->name }}" type="text" readonly>
                </div>
                <div class="form-group">
                    <label for="user-email" class="form-control-label">Email</label>
                    <input class="form-control" name="email" value="{{ $user->email }}" type="email">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Nama Pengguna</label>
                    <input class="form-control" name="username" value="{{ $user->username }}" type="text"
                        placeholder="Nama Pengguna">
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <!-- Button Kembali (Left) -->
                        <a href="{{ route('user-details.show', ['childId' => request('childId')]) }}"
                            class="btn btn-secondary btn-sm me-2">Kembali</a>

                    </div>
                    <div class="col-6 text-end">
                        <!-- Button Kemaskini Kata Laluan (Right) -->
                        <button type="submit" class="btn btn-primary btn-sm">
                            {{ __('Kemaskini') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection