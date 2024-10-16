<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Detail Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="total-harga" class="col-form-label">Total Harga:</label>
                    <input type="number" class="form-control" id="total-harga">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-total-harga"></div>
                </div>

                <div class="form-group">
                    <label for="pelanggan" class="col-form-label">Pelanggan:</label>
                    <input type="number" class="form-control" id="pelanggan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-pelanggan"></div>
                </div>
                
                <div class="form-group">
                    <label for="kasir" class="control-label">Kasir:</label>
                    <input type="text" class="form-control" id="kasir">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kasir"></div>
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
    $('body').on('click', '#btn-create-penjualan', function () {

        $('#modal-create').modal('show');
        
    });

    $('#store').click(function(e) {
        e.preventDefault();

        let total_harga = $('#total-harga').val();
        let pelanggan = $('#pelanggan').val();
        let kasir = $('#kasir').val();
        let token = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({

            url: '/dashboard_history_penjualan',
            type: "POST",
            cache: false,
            data: {
                'total_harga' : total_harga,
                'pelanggan' : pelanggan,
                'kasir' : kasir,
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
                console.log(error.responseJSON);
                if(error.responseJSON.total_harga[0]) {

                    $('#alert-total-harga').removeClass('d-none');
                    $('#alert-total-harga').addClass('d-block');

                    $('#alert-total-harga').html(error.responseJSON.total_harga[0]);
                }
                if(error.responseJSON.pelanggan[0]) {

                    $('#alert-pelanggan').removeClass('d-none');
                    $('#alert-pelanggan').addClass('d-block');

                    $('#alert-pelanggan').html(error.responseJSON.pelanggan[0]);
                }
                if(error.responseJSON.kasir[0]) {

                    $('#alert-kasir').removeClass('d-none');
                    $('#alert-kasir').addClass('d-block');

                    $('#alert-kasir').html(error.responseJSON.kasir[0]);
                }

            }

        });

    });

</script>