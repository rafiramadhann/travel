<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= ucwords($data['submenu']); ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                        This week
                    </button> -->
        </div>
    </div>

    <div id="dashboardContent">

        <div class="row ">

            <div class="col-md-3 my-1">

                <ul>
                    <?php foreach ($data['allrooms'] as $rooms) : ?>

                        <?php if ($rooms['terisi'] == 1) :  ?>

                            <li class="border w-100 p-2  bg-danger">
                                <a href="" onclick="alert('Room penuh!')">
                                    <div class="fs-3  text-light">Room <?= $rooms['room_no']; ?></div>
                                </a>
                            </li>

                        <?php elseif ($rooms['room_no'] == $data['selectedRoom']) : ?>

                            <li class="border w-100 p-2  bg-success">
                                <a href="">
                                    <div class="fs-3  text-light">Room <?= $rooms['room_no']; ?></div>
                                </a>
                            </li>

                        <?php else : ?>

                            <li class="border w-100 p-2">
                                <a href="<?= BASEURL; ?>/hotel/manage/checkin/<?= $rooms['room_no']; ?>">
                                    <div class="fs-3">Room <?= $rooms['room_no']; ?></div>
                                </a>
                            </li>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </ul>

            </div>

            <?php if ($data['roomAccess']) : ?>

                <div class="col-md-9 my-1">

                    <div class="row">
                        <div class="col">
                            <div class="fs-3 text-center mb-3">
                                Room <?= $data['roomCheck']['room_no']; ?>
                            </div>

                            <div class="row border rounded mb-3 p-3">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="fs-5 mb-3">Beds: <?= $data['roomCheck']['beds'] == 1 ? 'Single Bed' : 'Double Bed'; ?></div>

                                        <div class="fs-5 mb-3">Batas Dewasa: <?= $data['roomCheck']['max_adults']; ?></div>

                                        <div class="fs-5 mb-3">Max Anak: <?= $data['roomCheck']['max_anak']; ?></div>

                                    </div>

                                    <div class="col-md-6">
                                        <?php $features = explode(',', $data['roomCheck']['features']); ?>

                                        <div class="fs-5 mb-3">Fasilitas: </div>

                                        <ul>
                                            <?php foreach ($features as $feature) : ?>

                                                <li>
                                                    <div class="fs-5 mb-3" style="margin-left: -25px;">-
                                                        <?= ucwords($feature); ?>
                                                    </div>
                                                </li>

                                            <?php endforeach; ?>
                                        </ul>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <form action="<?= BASEURL; ?>/hotel/manage/checkin/apply" method="post">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="u_name" id="name" placeholder="name@example.com" autocomplete="off" autofocus required>
                                    <label for="name">Name</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Password" autocomplete="off" required>
                                    <label for="email">Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" autocomplete="off" required>
                                    <label for="no_telp">No Telp</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="total_inap" id="total_inap" placeholder="total_inap" value="0" min="0" max="30">
                                    <label for="total_inap">Total Inap</label>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="total_dewasa" aria-label="Floating label select example" name="total_dewasa">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                    <label for="total_dewasa">Dewasa</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="total_anak" aria-label="Floating label select example" name="total_anak">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <label for="total_anak">Kids ( 0 - 12 tahun )</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="checkinDate" id="checkinDate" placeholder="checkinDate" min=<?= date('Y-m-d', time() + 6 * 60 * 60); ?> value=<?= date('Y-m-d', time() + 6 * 60 * 60); ?>>
                                    <label for="checkinDate">Check In</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="checkoutDate" id="checkoutDate" placeholder="checkoutDate" readonly>
                                    <label for="checkoutDate">Check Out</label>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="room_no" value="<?= $data['roomCheck']['room_no']; ?>">
                                <input type="hidden" name="hotel_id" value="<?= $data['roomCheck']['hotel_id']; ?>">
                                <button type="submit" name="submit" class="btn btn-secondary mx-auto d-block mb-5">Check In</button>
                            </div>
                        </div>

                    </form>

                </div>
            <?php endif; ?>

        </div>

    </div>

</main>

<script>
    var total_inap = document.querySelector('#total_inap');
    var checkinDate = document.querySelector('#checkinDate');
    var checkoutDate = document.querySelector('#checkoutDate');

    total_inap.addEventListener('keyup', function(e) {
        var unicode = e.key;

        if (unicode == '-' || total_inap.value < 0) {
            total_inap.value = '';
        };

    })

    total_inap.addEventListener('change', function() {

        var someDate = new Date(checkinDate.value);
        console.log(someDate)
        var numberOfDaysToAdd = parseInt(total_inap.value);
        console.log(numberOfDaysToAdd)
        var result = someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
        var todayDate = new Date(result);
        console.log(todayDate)

        // Get year, month, and day part from the date
        var year = todayDate.toLocaleString("default", {
            year: "numeric"
        });
        var month = todayDate.toLocaleString("default", {
            month: "2-digit"
        });
        var day = todayDate.toLocaleString("default", {
            day: "2-digit"
        });

        // Generate yyyy-mm-dd date string
        var formattedDate = year + "-" + month + "-" + day;
        checkoutDate.value = formattedDate;
    })

    checkinDate.addEventListener('change', function() {

        var someDate = new Date(checkinDate.value);
        var numberOfDaysToAdd = parseInt(total_inap.value);
        var result = someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
        var todayDate = new Date(result);

        // Get year, month, and day part from the date
        var year = todayDate.toLocaleString("default", {
            year: "numeric"
        });
        var month = todayDate.toLocaleString("default", {
            month: "2-digit"
        });
        var day = todayDate.toLocaleString("default", {
            day: "2-digit"
        });

        // Generate yyyy-mm-dd date string
        var formattedDate = year + "-" + month + "-" + day;
        checkoutDate.value = formattedDate;
    })

    var no_telp = document.querySelector('#no_telp');
    var old_no_telp = no_telp.value;

    no_telp.addEventListener('keyup', function() {
        if (no_telp.value >= 0) {
            old_no_telp = no_telp.value;
        } else {
            no_telp.value = old_no_telp
        }
    })
</script>