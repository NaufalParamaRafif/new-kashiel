<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Nama Kategori:</label>
                    <input type="text" class="form-control" id="name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
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
    $('body').on('click', '#btn-create-category', function () {

        $('#modal-create').modal('show');
        
    });

    $('#store').click(function(e) {
        e.preventDefault();

        let name   = $('#name').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({

            url: '/dashboard_category',
            type: "POST",
            cache: false,
            data: {
                "name": name,
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
                
                if(error.responseJSON.name[0]) {

                    $('#alert-name').removeClass('d-none');
                    $('#alert-name').addClass('d-block');

                    $('#alert-name').html(error.responseJSON.name[0]);
                } 

            }

        });

    });

</script>