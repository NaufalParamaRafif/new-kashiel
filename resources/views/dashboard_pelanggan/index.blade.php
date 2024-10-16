@extends('template_dashboard.template')
@section('content_body')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-pelanggan">+ Tambah</a>
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($pelanggans as $pelanggan)
                                    <tr id="index_{{ $pelanggan->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pelanggan->nama_pelanggan }}</td>
                                        <td>{{ $pelanggan->alamat }}</td>
                                        <td>{{ $pelanggan->nomor_tlp }}</td>
                                        <td>
                                            <a href="javascript:void(0)" id="btn-detail-pelanggan" data-id="{{ $pelanggan->id }}" class="btn mb-1 btn-primary">Detail</a>
                                            <a href="javascript:void(0)" id="btn-edit-pelanggan" data-id="{{ $pelanggan->id }}" class="btn mb-1 btn-warning">Edit</a>
                                            <a href="javascript:void(0)" id="btn-delete-pelanggan" data-id="{{ $pelanggan->id }}" class="btn mb-1 btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Belum memiliki <strong>Pelanggan.</strong></td>
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
@include('dashboard_pelanggan.create')
{{-- @include('dashboard_pelanggan.show')--}}
@include('dashboard_pelanggan.edit')
@include('dashboard_pelanggan.delete')
@endsection