$(document).ready(function () {
    $('#addProduk').click(function () {
        $('#modalProduk').modal('show');

        $('#id').val('');
        $('#nama_produk').val('');
        $('#stok').val('');
        $('#harga').val('');
        $('#nama_latin').val('');
        $('#deskripsi').val('');
        $('#khasiat').val('');
        $('#gizi').val('');
        $('#budidaya').val('');
        $('#suhu').val('');
    });

    $('.edit').click(function () {
        var id = $(this).data('id');
        // alert(id);

        $.ajax({
            url: 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getProdukById?id=' + id,
            type: 'GET',
            success: function (res) {
                $('#modalEditProduk').modal('show');
                var row = res[0];

                $('#idedit').val(row._id);
                $('#nama_produkedit').val((row.nama_produk?row.nama_produk:''));
                $('#stokedit').val(row.stok);
                $('#hargaedit').val(row.harga);
                $('#nama_latinedit').val(row.nama_latin);
                $('#deskripsiedit').val(row.deskripsi);
                $('#khasiatedit').val(row.khasiat);
                $('#giziedit').val(row.gizi);
                $('#budidayaedit').val(row.budidaya);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    $('#grafikStok').click(function () {
        $('#modalGrafik').modal('show');
    });
});