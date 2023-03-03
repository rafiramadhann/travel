<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= ucwords($data['submenu']); ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#roomModal">
                <span data-feather="calendar" class="align-text-bottom"></span>
                Tambah Kamar
            </a>
        </div>
    </div>

    <div id="dashboardContent">

        <div class="row">

            <?php foreach ($data['allrooms'] as $rooms) : ?>

                <?php if ($rooms['terisi'] == 1) : ?>

                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <h5 class="card-header bg-danger bg-opacity-75">Room <?= $rooms['room_no']; ?></h5>
                            <div class="card-body text-end">
                                <div class="align-self-center fs-1">Terisi
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else :  ?>

                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <h5 class="card-header bg-success bg-opacity-75">Room <?= $rooms['room_no']; ?></h5>
                            <div class="card-body text-end">
                                <div class="align-self-center fs-1">Kosong
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

</main>


<!-- Modal -->
<div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="addRoomModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addRoomModal">Tambah Kamar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/hotel/manage/add" method="post">
                    <div class="row">
                        <div class="col text-center">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="no_kamar" id="no_kamar" placeholder="No Kamar">
                                        <label for="no_kamar">No Kamar</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <div class="form-floating">
                                            <select class="form-select" name="beds" id="beds" aria-label="Floating label select example">
                                                <option selected disabled>Open this select menu</option>
                                                <option value="1">Single Bed</option>
                                                <option value="2">Double Bed</option>
                                            </select>
                                            <label for="beds">Beds</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="max_adults" id="max_adults" placeholder="Password" min=0 max=6 value=0>
                                        <label for="max_adults">Max Adults</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="max_anak" id="max_anak" placeholder="Password" min=0 max=3 value=0>
                                        <label for="max_anak">Max Anak ( 0 - 12 tahun )</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="fs-5">Features</div>
                                <?php foreach ($data['roomFeatures'] as $feature) : ?>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="<?= $feature; ?>" value="<?= $feature; ?>" id="<?= $feature; ?>">
                                            <label class="form-check-label" for="<?= $feature; ?>">
                                                <?= $feature; ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <?php if (isset($_SESSION['data'])) : ?>
                    <input type="hidden" name="hotel_id" value="<?= $data['activeHotel']['hotel_id']; ?>">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Tambah Kamar</button>
                    </form>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    var no_kamar = document.querySelector('#no_kamar');
    var old_no_kamar = no_kamar.value;

    no_kamar.addEventListener('keyup', function() {
        if (no_kamar.value >= 0) {
            old_no_kamar = no_kamar.value;
        } else {
            no_kamar.value = old_no_kamar
        }
    })
</script>