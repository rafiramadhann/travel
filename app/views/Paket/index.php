<div class="row">
    <div class="col">
        <div class="text-center my-5">
            <div class="fs-2">Daftar Paket Wisata</div>
            <p class="heading-section fs-5">Bingung mau wisata kemana? Yuk, rencanakan wisata kalian di sini!</p>
        </div>

        <?php foreach ($data['daerah'] as $daerah) : ?>

            <div class="card text-bg-dark float-start my-2 card-tempat" style="width: 23%; margin-right:1%; margin-left:1%">
                <img src="https://picsum.photos/300/300?random=1" class="card-img-top img-fluid" alt="...">
                <div class="card-img-overlay d-flex align-items-center flex-fill p-0">
                    <a href="<?= BASEURL; ?>/paket/<?= $daerah['slug']; ?>" id="detail" class="card-link stretched-link flex-fill bg-dark text-light p-3 bg-opacity-25">
                        <h5 class="card-title text-center"><?= $daerah['name']; ?></h5>
                    </a>
                </div>
            </div>


        <?php endforeach; ?>

    </div>
</div>