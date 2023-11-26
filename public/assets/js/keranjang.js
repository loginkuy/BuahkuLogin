$(document).ready(function () {
    $('.edit').click(function () {
        var id = $(this).data('id');

        $.ajax({
            url: 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getProdukKeranjangById?id=' + id,
            type: 'GET',
            success: function (res) {
                $('#modalEditKeranjang').modal('show');
                var row = res[0];

                $('#id').val(row._id);
                $('#produk').val((row.nama_produk));
                $('#harga').val(row.harga);
                $('#jumlah').val(row.qty);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
    $('#pesan').click(function () {
        $('#modalPesan').modal('show');
    });
});