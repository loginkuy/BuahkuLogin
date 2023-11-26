$(document).ready(function () {

    $('#rekomendasi').click(function () {
        $.ajax({
            url: 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getRekomendasi',
            type: 'GET',
            data:{
                suhu: $('#suhu').val(),
                tanah: $('#tanah').val()
            },
            beforeSend: function(){
                $('#listRekomendasi').html('<div class="col-lg-12 mt-3 m-auto h-2 text-center">'+
                '<h1>Sedang Diproses...</h1>'+
                '</div>');
            },
            success: function (res) {
                var view = '';
    
                if(res.length != 0){
                    res.map(data =>{
                        view += '<div class="col-lg-3 mt-3 mt-5">'+
                            '<a href="Budidaya/Detail/'+data._id+'">'+
                                '<div class="card">'+
                                    '<img src="../../assets/images/produk/'+data.foto+'" class="card-img-top" alt="'+data.nama_produk+'">'+
                                    '<div class="card-body">'+
                                        '<h5 class="card-title-budidaya">'+data.nama_produk+'</h5>'+
                                    '</div>'+
                                '</div>'+
                            '</a>'+
                    '</div>';
                    });
                }else{
                    view = '<div class="col-lg-12 m-auto h-2 mt-3 text-center">'+
                    '<h1>Mohon Maaf, Tidak Ada Buah Yang Cocok Ditanam Dengan Kriteria Tersebut</h1>'+
                    '</div>';
                }
                $('#listRekomendasi').html(view);
            },
            error: function (err) {
                console.log(err);
            }

        });
        return false;
    });
});