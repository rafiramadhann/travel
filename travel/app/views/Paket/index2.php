<div class="row">
    <div class="col">
        <div class="text-center my-5">
            <div class="fs-2">Daftar Paket Wisata</div>
            <p class="heading-section fs-5">Bingung mau wisata kemana? Yuk, rencanakan wisata kalian di sini!</p>
        </div>


        <div class="row">
            <div class="col-md-3">
                <ul class="city-select">
                    <?php foreach ($data['daerah'] as $daerah) : ?>
                        <li>
                            <a href="<?= BASEURL; ?>/paket/<?= $daerah['slug']; ?>" class="fs-4 px-2 <?= $data['slug'] == $daerah['slug'] ? 'selected-city' : ''; ?>"><?= $daerah['name']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php if (count($data['paket'])) : ?>
                <div class="col-md-9">
                    <?php foreach ($data['paket'] as $paket) : ?>
                        <?php $paket['description'] = str_replace('-', "<br>-", $paket['description']); ?>


                        <div class="card float-start my-2" style="width: 31%; margin-right:1%; margin-left:1%">
                            <div class="card-body card-tempat p-0">
                                <img src="https://picsum.photos/300/300?random=1" class="card-img-top img-fluid mb-3" alt="...">
                                <a href="" class="card-link stretched-link tampilData px-3 pb-3 d-block" data-bs-toggle="modal" data-bs-target="#exampleModal" data-slug="<?= $paket['slug']; ?>">
                                    <h5 class="card-title"><?= $paket['name']; ?></h5>
                                    <p class="card-text text-truncate"><?= $paket['promosi']; ?></p>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php else : ?>
                <div class="col-md-6">
                    <div class="fs-3 text-center mt-5">Paket Belum Tersedia</div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="overflow-hidden mb-3" style="height: 250px;">
                            <img src="https://picsum.photos/1280/720?random=1" alt="" class="img-fluid" id="image-paket">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <div class="fs-2 " id="judul">Judul</div>
                        <div class="mb-2 fs-4 heading-section" id="price-paket"></div>

                        <div class="mb-2" id="promosi-paket"></div>
                        <div class="mb-2" id="description-paket"></div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php if (isset($_SESSION['data'])) : ?>
                    <form action="<?= BASEURL; ?>/reservasi/" method="post">
                        <input type="hidden" name="id_paket" value="">
                        <button type="submit" name="submit" id="booking" class="btn btn-primary">Reservasi</button>
                    </form>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>