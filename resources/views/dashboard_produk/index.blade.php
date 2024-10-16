@extends('template_dashboard.template')
@section('content_body')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-produk">+ Tambah</a>
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Total Harga</th>
                                        <th>Stok</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($products as $produk)
                                    <tr id="index_{{ $produk->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->harga }}</td>
                                        <td>{{ $produk->stok }}</td>
                                        <td>{{ $produk->category()->get()[0]->name ?? 'Tidak diketahui' }}</td>
                                        <td>
                                            <a href="javascript:void(0)" id="btn-detail-produk" data-id="{{ $produk->id }}" class="btn mb-1 btn-primary">Detail</a>
                                            <a href="javascript:void(0)" id="btn-edit-produk" data-id="{{ $produk->id }}" class="btn mb-1 btn-warning">Edit</a>
                                            <a href="javascript:void(0)" id="btn-delete-produk" data-id="{{ $produk->id }}" class="btn mb-1 btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Belum memiliki <strong>Produk.</strong></td>
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
@include('dashboard_produk.create')
{{-- @include('dashboard_produk.show')--}}
@include('dashboard_produk.delete')
@include('dashboard_produk.edit')
@endsection