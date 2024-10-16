<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="pelanggan_id" @disabled(true)>

                <div class="form-group">
                    <label for="nama-pelanggan-edit" class="control-label">Nama Pelanggan:</label>
                    <input type="text" class="form-control" id="nama-pelanggan-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-pelanggan-edit"></div>
                </div>

                <div class="form-group">
                    <label for="alamat-edit" class="col-form-label">Alamat:</label>
                    <textarea class="form-control" id="alamat-edit"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-alamat-edit"></div>
                </div>
                
                <div class="form-group">
                    <label for="nomor-tlp-edit" class="control-label">No Telepon:</label>
                    <input type="text" class="form-control" id="nomor-tlp-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nomor-tlp-edit"></div>
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
    $('body').on('click', '#btn-edit-pelanggan', function () {

        let pelanggan_id = $(this).data('id');

        $.ajax({
            url: `/dashboard_pelanggan/${pelanggan_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                $('#pelanggan_id').val(response.data.id);
                $('#nama-pelanggan-edit').val(response.data.nama_pelanggan);
                $('#alamat-edit').val(response.data.alamat);
                $('#nomor-tlp-edit').val(response.data.nomor_tlp);

                $('#modal-edit').modal('show');
            }
        });
    });

    $('#update').click(function(e) {
        e.preventDefault();

        let pelanggan_id = $('#pelanggan_id').val();
        let nama_pelanggan = $('#nama-pelanggan-edit').val();
        let alamat = $('#alamat-edit').val();
        let nomor_tlp = $('#nomor-tlp-edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({
            url: `/dashboard_pelanggan/${pelanggan_id}`,
            type: "PUT",
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
                        $('#modal-edit').modal('hide');
                        setInterval(() => window.location.reload(), 2500);
                    }
                });
            },
            error:function(error){
                console.log(error.responseJSON);
                if(error.responseJSON.nama_pelanggan[0]) {

                    $('#alert-nama-pelanggan-edit').removeClass('d-none');
                    $('#alert-nama-pelanggan-edit').addClass('d-block');

                    $('#alert-nama-pelanggan-edit').html(error.responseJSON.nama_pelanggan[0]);
                }
                if(error.responseJSON.alamat[0]) {

                    $('#alert-alamat-edit').removeClass('d-none');
                    $('#alert-alamat-edit').addClass('d-block');

                    $('#alert-alamat-edit').html(error.responseJSON.alamat[0]);
                }
                if(error.responseJSON.nomor_telepon[0]) {

                    $('#alert-nomor-tlp-edit').removeClass('d-none');
                    $('#alert-nomor-tlp-edit').addClass('d-block');

                    $('#alert-nomor-tlp-edit').html(error.responseJSON.nomor_telepon[0]);
                }

            }

        });

    });

</script>