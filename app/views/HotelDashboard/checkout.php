<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= ucwords($data['submenu']); ?></h1>
    </div>

    <div id="dashboardContent">

        <form action="<?= BASEURL; ?>/hotel/manage/checkout/confirm" method="post">
            <div class="row">
                <?php foreach ($data['allrooms'] as $rooms) : ?>

                    <?php if ($rooms['terisi'] == 1) : ?>

                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <h5 class="card-header bg-danger bg-opacity-75">Room <?= $rooms['room_no']; ?></h5>
                                <div class="card-body text-end">
                                    <div class="align-self-center fs-1">
                                        <a href="" class="stretched-link tampilRoom" data-bs-toggle="modal" data-bs-target="#checkinModal" data-slug="<?= $rooms['room_no']; ?>" data-id="<?= $rooms['hotel_id']; ?>">
                                            Terisi
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php else :  ?>

                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <h5 class="card-header bg-success bg-opacity-75">Room <?= $rooms['room_no']; ?></h5>
                                <div class="card-body text-end">
                                    <div class="align-self-center fs-1">
                                        <a href="" class="stretched-link" onclick="alert('Room kosong!')">
                                            Kosong
                                        </a>
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
<div class="modal fade" id="checkinModal" tabindex="-1" aria-labelledby="addRoomModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addRoomModal">Check Out</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-6">

                                <span class="fs-5">No Kamar:
                                </span>
                                <span class="fs-5" id="no_kamar"></span>

                            </div>
                            <div class="col-md-6">

                                <div class="fs-5 mb-2"><span>Nama: </span><span id="name"></span></div>
                                <div class="fs-5 mb-2"><span>No Telp: </span><span id="no_telp"></span></div>
                                <div class="fs-5 mb-2"><span>Dewasa: </span><span id="dewasa"></span></div>
                                <div class="fs-5 mb-2"><span>Anak: </span><span id="anak"></span></div>

                            </div>
                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="fs-5 mb-2"><span>Check In: </span><span id="checkin"></span></div>
                            </div>

                            <div class="col-md-6">
                                <div class="fs-5 mb-2"><span>Check Out: </span><span id="checkout"></span></div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="fs-5 mb-2"><span>Price: Rp. </span><span id="price"></span></div>
                            </div>

                            <div class="col-md-6">
                                <div class="fs-5 mb-2"><span>Facility: Rp. </span><span id="add_fee"></span></div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div></div>
                            </div>

                            <div class="col-md-6">
                                <div class="fs-5 mb-2"><span>Total Price: Rp. </span><span id="total_price"></span></div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php if (isset($_SESSION['data'])) : ?>
                    <input type="hidden" name="hotel_id" value="<?= $data['activeHotel']['hotel_id']; ?>">
                    <input type="hidden" name="room_no" id="room_no" value="">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Check Out</button>
                    </form>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>