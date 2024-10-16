<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="produk_id" @disabled(true)>

                <div class="form-group">
                    <label for="nama-produk-edit" class="control-label">Nama Produk:</label>
                    <input type="text" class="form-control" id="nama-produk-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-produk-edit"></div>
                </div>

                <div class="form-group">
                    <label for="harga-edit" class="col-form-label">Harga:</label>
                    <input type="number" class="form-control" id="harga-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-harga-edit"></div>
                </div>

                <div class="form-group">
                    <label for="stok-edit" class="col-form-label">Stok:</label>
                    <input type="number" class="form-control" id="stok-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-stok-edit"></div>
                </div>
                
                <div class="form-group">
                    <label for="kategori-edit" class="control-label">Kategori:</label>
                    <input type="text" class="form-control" id="kategori-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kategori-edit"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="update">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '#btn-edit-produk', function () {

        let produk_id = $(this).data('id');

        $.ajax({
            url: `/dashboard_produk/${produk_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                $('#produk_id').val(response.data.id);
                $('#nama-produk-edit').val(response.data.nama_produk);
                $('#harga-edit').val(response.data.harga);
                $('#stok-edit').val(response.data.stok);
                $('#kategori-edit').val(response.data.category_id);

                $('#modal-edit').modal('show');
            }
        });
    });

    $('#update').click(function(e) {
        e.preventDefault();

        let produk_id = $('#produk_id').val();
        let nama_produk = $('#nama-produk-edit').val();
        let harga = $('#harga-edit').val();
        let stok = $('#stok-edit').val();
        let kategori = $('#kategori-edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({
            url: `/dashboard_produk/${produk_id}`,
            type: "PUT",
            cache: false,
            data: {
                'nama_produk' : nama_produk,
                'harga' : harga,
                'stok' : stok,
                'kategori' : kategori,
                "_token": token
            },
            success:function(response){

                Swal.fire({
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 2500,
                    didOpen: (toast) => {
                        $('#modal-edit').modal('hide');
                        setInterval(() => window.location.reload(), 2500);
                    }
                });
            },
            error:function(error){
                console.log(error.responseJSON);
                if(error.responseJSON.nama_produk[0]) {

                    $('#alert-nama-produk-edit').removeClass('d-none');
                    $('#alert-nama-produk-edit').addClass('d-block');

                    $('#alert-nama-produk-edit').html(error.responseJSON.nama_produk[0]);
                }
                if(error.responseJSON.harga[0]) {

                    $('#alert-harga-edit').removeClass('d-none');
                    $('#alert-harga-edit').addClass('d-block');

                    $('#alert-harga-edit').html(error.responseJSON.harga[0]);
                }
                if(error.responseJSON.stok[0]) {

                    $('#alert-stok-edit').removeClass('d-none');
                    $('#alert-stok-edit').addClass('d-block');

                    $('#alert-stok-edit').html(error.responseJSON.stok[0]);
                }
                if(error.responseJSON.kategori[0]) {

                    $('#alert-kategori-edit').removeClass('d-none');
                    $('#alert-kategori-edit').addClass('d-block');

                    $('#alert-kategori-edit').html(error.responseJSON.kategori[0]);
                }

            }

        });

    });

</script>