@extends('template_dashboard.template')
@section('content_body')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-category">+ Tambah</a>
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr id="index_{{ $category->id }}">
                                            <td class="col-1">{{ $loop->iteration }}</td>
                                            <td class="col-5">{{ $category->name }}</td>
                                            <td class="col-4">
                                                <a href="javascript:void(0)" id="btn-detail-category" data-id="{{ $category->id }}" class="btn mb-1 btn-primary">Detail</a>
                                                <a href="javascript:void(0)" id="btn-edit-category" data-id="{{ $category->id }}" class="btn mb-1 btn-warning">Edit</a>
                                                <a href="javascript:void(0)" id="btn-delete-category" data-id="{{ $category->id }}" class="btn mb-1 btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Belum memiliki <strong>Kategori.</strong></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</div>
@include('dashboard_category.create')
@include('dashboard_category.show')
@include('dashboard_category.edit')
@include('dashboard_category.delete')
@endsection