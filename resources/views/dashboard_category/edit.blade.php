<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="category_id" @disabled(true)>

                <div class="form-group">
                    <label for="name" class="control-label">Nama kategori</label>
                    <input type="text" class="form-control" id="name-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
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
    $('body').on('click', '#btn-edit-category', function () {

        let category_id = $(this).data('id');

        $.ajax({
            url: `/dashboard_category/${category_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response.data.name);
                $('#category_id').val(response.data.id);
                $('#name-edit').val(response.data.name);

                $('#modal-edit').modal('show');
            }
        });
    });

    $('#update').click(function(e) {
        e.preventDefault();

        let category_id = $('#category_id').val();
        let name = $('#name-edit').val();
        let token = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({
            url: `/dashboard_category/${category_id}`,
            type: "PUT",
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
                        $('#modal-edit').modal('hide');
                        setInterval(() => window.location.reload(), 2500);
                    }
                });
            },
            error:function(error){
                console.log(error.responseJSON.name[0]);
                if(error.responseJSON.name[0]) {

                    $('#alert-name-edit').removeClass('d-none');
                    $('#alert-name-edit').addClass('d-block');

                    $('#alert-name-edit').html(error.responseJSON.name[0]);
                }

            }

        });

    });

</script>