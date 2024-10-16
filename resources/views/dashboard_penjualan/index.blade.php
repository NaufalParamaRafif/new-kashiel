@extends('template_dashboard.template')
@section('content_body')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-penjualan">+ Tambah</a>
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Total Harga</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nama Kasir</th>
                                        <th>Tanggal Penjualan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($penjualans as $penjualan)
                                    <tr id="index_{{ $penjualan->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $penjualan->total_harga }}</td>
                                        <td>{{ $penjualan->pelanggan()->get()[0]->nama_pelanggan ?? 'Tidak diketahui'}}</td>
                                        <td>{{ $penjualan->kasir()->get()[0]->name ?? 'Tidak diketahui'}}</td>
                                        <td>{{ $penjualan->created_at }}</td>
                                        <td>
                                            <a href="javascript:void(0)" id="btn-detail-penjualan" data-id="{{ $penjualan->id }}" class="btn mb-1 btn-primary">Detail</a>
                                            <a href="javascript:void(0)" id="btn-edit-penjualan" data-id="{{ $penjualan->id }}" class="btn mb-1 btn-warning">Edit</a>
                                            <a href="javascript:void(0)" id="btn-delete-penjualan" data-id="{{ $penjualan->id }}" class="btn mb-1 btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Belum memiliki <strong>Penjualan.</strong></td>
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
@include('dashboard_penjualan.create')
@include('dashboard_penjualan.edit')
@include('dashboard_penjualan.delete')
@endsection