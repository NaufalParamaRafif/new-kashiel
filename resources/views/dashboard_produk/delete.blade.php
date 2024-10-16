<script>
    $('body').on('click', '#btn-delete-produk', function () {

        let produk_id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({

                    url: `/dashboard_produk/${produk_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
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
                    }
                });

                
            }
        })
        
    });
</script>