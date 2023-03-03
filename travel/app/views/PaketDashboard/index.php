<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= ucwords($data['submenu']); ?></h1>
        <div class="fs-4 text-center mb-3 heading-section">Daftar Paket</div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#roomModal">
                <span data-feather="calendar" class="align-text-bottom"></span>
                Tambah Paket
            </a>
        </div>
    </div>

    <div id="dashboardContent">
        <div class="row">


            <?php foreach ($data['allPaket'] as $pakets) : ?>

                <div class="col-md-3 mb-3">
                    <div class="card">
                        <h5 class="card-header bg-success bg-opacity-75"><?= $pakets['name']; ?></h5>
                        <div class="card-body text-center">

                            <div class="align-self-center fs-4">

                                <div class="row justify-content-evenly">

                                    <div class="col-md-5">
                                        <form action="<?= BASEURL; ?>/paket/manage/update" method="post">
                                            <input type="hidden" name="paket_id" value="<?= $pakets['id']; ?>">

                                            <button type="submit" name="submit" class="btn btn-warning">
                                                Edit
                                            </button>

                                        </form>
                                    </div>

                                    <div class="col-md-5">
                                        <form action="<?= BASEURL; ?>/paket/drop" method="post">
                                            <input type="hidden" name="paket_id" value="<?= $pakets['id']; ?>">
                                            <input type="hidden" name="old_image" value="<?= $pakets['image']; ?>">

                                            <button type="submit" class="btn btn-danger" name="drop" onclick="return confirm('Yakin ingin menghapus <?= $pakets['name']; ?>?')">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

</main>



<!-- Modal -->
<div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="addRoomModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addRoomModal">Tambah Paket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="<?= BASEURL; ?>/paket/manage/add" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col text-center">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="paket_name">
                                        <label for="name">Nama Paket</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="slug" id="slug" placeholder="paket_slug" readonly>
                                        <label for="slug">Slug Paket</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="price" id="price" placeholder="paket_price">
                                        <label for="price">Harga Paket</label>
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
                                <textarea class="form-control" placeholder="Leave a promotion here" id="promotion" name="promotion" style="height: 100px"></textarea>
                                <label for="promotion">Promosi</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a description here" id="description" name="description" style="height: 100px"></textarea>
                                <label for="description">Deskripsi</label>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Paket Image</label>
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