<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="404.css"> -->
    <link href="<?php echo base_url('assets/css/404.css');?>" type="text/css" rel="stylesheet">
    <title>404 Halaman Tidak tersedia</title>
</head>
<body>

    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center">404</h1>
                        </div>
                        <div class="content_box_404">
                            <h3 class="h2">Sepertinya Anda Tersesat</h3>
                            <p>Halaman yang Anda cari tidak tersedia</p>
                            <a href="<?= base_url('/')?>">Pergi ke Beranda</a>
                            <p>
                                <?php if (ENVIRONMENT !== 'production') : ?>
                                    <?= nl2br(esc($message)) ?>
                                <?php else : ?>
                                    <?= lang('Errors.sorryCannotFind') ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
