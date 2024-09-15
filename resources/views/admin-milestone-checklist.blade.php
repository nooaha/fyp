@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- start letak foreach loop-->
    <div class="row">
      <div class="col-md-12 mt-0">
        <div class="card">
          <div class="card-header pb-0">
          <div class="row mb-0">
            <div class="col-md-9">
                <h6 class="mb-0">Kemaskini Senarai Perkembangan</h6>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('admin-milestone') }}" class="btn btn-primary mb-3">Tambah</a>
                </div>
          </div> 
            
            
            <div class="card-body p-3">
                <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                    <span class="text-dark font-weight-bold ms-sm-2">Senarai Semak Pencapaian Perkembangan - 12 bulan </span>
                    </div>
                    <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                    <span class="text-dark font-weight-bold ms-sm-2">Senarai Semak Pencapaian Perkembangan - 15 bulan </span>
                    </div>
                    <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                    <span class="text-dark font-weight-bold ms-sm-2">Senarai Semak Pencapaian Perkembangan - 18 Bulan </span>
                    </div>
                    <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                    <span class="text-dark font-weight-bold ms-sm-2">Senarai Semak Pencapaian Perkembangan - 21 bulan </span>
                    </div>
                    <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    </div>
                </li>
                </ul>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection