<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="penjualan_id" @disabled(true)>

                <div class="form-group">
                    <label for="total-harga-edit" class="col-form-label">Total Harga:</label>
                    <input type="number" class="form-control" id="total-harga-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-total-harga-edit"></div>
                </div>

                <div class="form-group">
                    <label for="pelanggan-edit" class="col-form-label">Pelanggan:</label>
                    <input type="number" class="form-control" id="pelanggan-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-pelanggan-edit"></div>
                </div>
                
                <div class="form-group">
                    <label for="kasir-edit" class="control-label">Kasir:</label>
                    <input type="text" class="form-control" id="kasir-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kasir-edit"></div>
                </div>

                <div class="form-group">
                    <label for="tanggal-penjualan-edit" class="control-label">Tanggal Penjualan:</label>
                    <input type="datetime" class="form-control" id="tanggal-penjualan-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal-penjualan-edit"></div>
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
    $('body').on('click', '#btn-edit-penjualan', function () {

        let penjualan_id = $(this).data('id');

        $.ajax({
            url: `/dashboard_history_penjualan/${penjualan_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response.data);
                $('#penjualan_id').val(response.data.id);
                $('#total-harga-edit').val(response.data.total_harga);
                $('#pelanggan-edit').val(response.data.pelanggan_id);
                $('#kasir-edit').val(response.data.kasir_id);
                $('#tanggal-penjualan-edit').val(response.data.created_at);

                $('#modal-edit').modal('show');
            }
        });
    });

    $('#update').click(function(e) {
        e.preventDefault();

        let penjualan_id = $('#penjualan_id').val();
        let total_harga = $('#total-harga-edit').val();
        let pelanggan = $('#pelanggan-edit').val();
        let kasir = $('#kasir-edit').val();
        let tanggal_penjualan = $('#tanggal-penjualan-edit').val();
        let token  = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({
            url: `/dashboard_history_penjualan/${penjualan_id}`,
            type: "PUT",
            cache: false,
            data: {
                'total_harga' : total_harga,
                'pelanggan' : pelanggan,
                'kasir' : kasir,
                'tanggal_penjualan' : tanggal_penjualan,
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
                if(error.responseJSON.total_harga[0]) {

                    $('#alert-total-harga-edit').removeClass('d-none');
                    $('#alert-total-harga-edit').addClass('d-block');

                    $('#alert-total-harga-edit').html(error.responseJSON.total_harga[0]);
                }
                if(error.responseJSON.pelanggan[0]) {

                    $('#alert-pelanggan-edit').removeClass('d-none');
                    $('#alert-pelanggan-edit').addClass('d-block');

                    $('#alert-pelanggan-edit').html(error.responseJSON.pelanggan[0]);
                }
                if(error.responseJSON.kasir[0]) {

                    $('#alert-kasir-edit').removeClass('d-none');
                    $('#alert-kasir-edit').addClass('d-block');

                    $('#alert-kasir-edit').html(error.responseJSON.kasir[0]);
                }
                if(error.responseJSON.tanggal_penjualan[0]) {

                    $('#alert-tanggal-penjualan-edit').removeClass('d-none');
                    $('#alert-tanggal-penjualan-edit').addClass('d-block');

                    $('#alert-tanggal-penjualan-edit').html(error.responseJSON.tanggal_penjualan[0]);
                }

            }

        });

    });

</script>