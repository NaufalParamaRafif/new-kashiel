<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_produk" class="control-label">Nama Produk:</label>
                    <input type="text" class="form-control" id="nama_produk">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-produk"></div>
                </div>

                <div class="form-group">
                    <label for="harga" class="col-form-label">Harga:</label>
                    <input type="number" class="form-control" id="harga">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-harga"></div>
                </div>

                <div class="form-group">
                    <label for="stok" class="col-form-label">Stok:</label>
                    <input type="number" class="form-control" id="stok">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-stok"></div>
                </div>
                
                <div class="form-group">
                    <label for="kategori" class="control-label">Kategori:</label>
                    <input type="text" class="form-control" id="kategori">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kategori"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" id="store">Tambah</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('body').on('click', '#btn-create-produk', function () {

        $('#modal-create').modal('show');
        
    });

    $('#store').click(function(e) {
        e.preventDefault();

        let nama_produk = $('#nama_produk').val();
        let harga = $('#harga').val();
        let stok = $('#stok').val();
        let kategori = $('#kategori').val();
        let token = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({

            url: '/dashboard_produk',
            type: "POST",
            cache: false,
            data: {
                'nama_produk' : nama_produk,
                'harga' : harga,
                'stok' : stok,
                'kategori' :kategori,
                "_token": token
            },
            success:function(response){

                Swal.fire({
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 2500,
                    didOpen: (toast) => {
                        setInterval(() => window.location.reload(), 2500);
                    }
                });
            },
            error:function(error){
                if(error.responseJSON.nama_produk[0]) {

                    $('#alert-nama-produk').removeClass('d-none');
                    $('#alert-nama-produk').addClass('d-block');

                    $('#alert-nama-produk').html(error.responseJSON.nama_produk[0]);
                }
                if(error.responseJSON.harga[0]) {

                    $('#alert-harga').removeClass('d-none');
                    $('#alert-harga').addClass('d-block');

                    $('#alert-harga').html(error.responseJSON.harga[0]);
                }
                if(error.responseJSON.stok[0]) {

                    $('#alert-stok').removeClass('d-none');
                    $('#alert-stok').addClass('d-block');

                    $('#alert-stok').html(error.responseJSON.stok[0]);
                }
                if(error.responseJSON.kategori[0]) {

                    $('#alert-kategori').removeClass('d-none');
                    $('#alert-kategori').addClass('d-block');

                    $('#alert-kategori').html(error.responseJSON.kategori[0]);
                }

            }

        });

    });

</script>