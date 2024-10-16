<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_pelanggan" class="control-label">Nama Pelanggan:</label>
                    <input type="text" class="form-control" id="nama_pelanggan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-pelanggan"></div>
                </div>

                <div class="form-group">
                    <label for="alamat" class="col-form-label">Alamat:</label>
                    <textarea class="form-control" id="alamat"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-alamat"></div>
                </div>
                
                <div class="form-group">
                    <label for="nomor_tlp" class="control-label">No Telepon:</label>
                    <input type="text" class="form-control" id="nomor_tlp">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nomor-tlp"></div>
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
    $('body').on('click', '#btn-create-pelanggan', function () {

        $('#modal-create').modal('show');
        
    });

    $('#store').click(function(e) {
        e.preventDefault();

        let nama_pelanggan = $('#nama_pelanggan').val();
        let alamat = $('#alamat').val();
        let nomor_tlp = $('#nomor_tlp').val();
        let token = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({

            url: '/dashboard_pelanggan',
            type: "POST",
            cache: false,
            data: {
                "nama_pelanggan": nama_pelanggan,
                "alamat": alamat,
                "nomor_telepon": nomor_tlp,
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
                if(error.responseJSON.nama_pelanggan[0]) {

                    $('#alert-nama-pelanggan').removeClass('d-none');
                    $('#alert-nama-pelanggan').addClass('d-block');

                    $('#alert-nama-pelanggan').html(error.responseJSON.nama_pelanggan[0]);
                }
                if(error.responseJSON.alamat[0]) {

                    $('#alert-alamat').removeClass('d-none');
                    $('#alert-alamat').addClass('d-block');

                    $('#alert-alamat').html(error.responseJSON.alamat[0]);
                }
                if(error.responseJSON.nomor_telepon[0]) {

                    $('#alert-nomor-tlp').removeClass('d-none');
                    $('#alert-nomor-tlp').addClass('d-block');

                    $('#alert-nomor-tlp').html(error.responseJSON.nomor_telepon[0]);
                }

            }

        });

    });

</script>