<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= ucwords($data['submenu']); ?></h1>
        <div class="fs-4 text-center mb-3 heading-section">Daftar Hotel</div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#roomModal">
                <span data-feather="calendar" class="align-text-bottom"></span>
                Tambah Hotel
            </a>
        </div>
    </div>

    <div id="dashboardContent">
        <div class="row">
            <div class="col">

                <?php foreach ($data['hotels'] as $hotel) : ?>

                    <div class="card text-bg-dark float-start my-2 card-tempat" style="width: 23%; margin-right:1%; margin-left:1%">
                        <img src="https://picsum.photos/300/300?random=1" class="card-img-top img-fluid" alt="...">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center flex-column p-0">
                            <form action="<?= BASEURL; ?>/hotel/sync" method="post">
                                <input type="hidden" name="hotel_id" value="<?= $hotel['hotel_id']; ?>">
                                <button id="detail" class="stretched-link border-0 mx-auto d-block bg-dark text-light p-3 bg-opacity-25">
                                    <h5 class="card-title text-center"><?= $hotel['name']; ?></h5>
                                </button>
                            </form>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>

</main>


<!-- Modal -->
<div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="addRoomModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addRoomModal">Tambah Hotel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="<?= BASEURL; ?>/hotel/manage/tambah" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col text-center">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="hotel_name">
                                        <label for="name">Nama Hotel</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="slug" id="slug" placeholder="hotel_slug" readonly>
                                        <label for="slug">Slug Hotel</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="price" id="price" placeholder="night_price">
                                        <label for="price">Harga Per Malam</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="daerah_id" name="daerah_id" aria-label="Floating label select example">
                                            <option selected disabled>Pilih Daerah</option>
                                            <?php foreach ($data['daerah'] as $daerah) : ?>
                                                <option value="<?= $daerah['daerah_id']; ?>"><?= $daerah['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label for="daerah_id">Daerah</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a promotion here" id="facility" name="facility" style="height: 100px"></textarea>
                                <label for="facility">Fasilitas ( Pisahkan dengan koma ',' )</label>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control form-control-sm" type="file" id="image" name="image" accept="image/*" required>
                            </div>


                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <?php if (isset($_SESSION['data'])) : ?>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Tambah Paket</button>
                    </form>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    name.addEventListener("keyup", function() {
        let preslug = name.value;
        preslug = preslug.replace(/ /g, "-");
        slug.value = preslug.toLowerCase();
    });
</script>