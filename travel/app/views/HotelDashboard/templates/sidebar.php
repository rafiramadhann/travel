<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-2 fs-6" href="#">
        <img src="<?= BASEURL; ?>/img/logo.png" alt="Logo" width="25" height="25" class="d-inline-block align-text-top me-2"><?= $data['company']; ?>
    </a>
    <div class="navbar-nav bg-light bg-opacity-25">
        <div class="nav-item text-nowrap">
            <button class="nav-link bg-light bg-opacity-25 pt-2 pb-3 px-2 border-0 d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    <div class="fs-6 me-auto ms-3">Login as <?= ucwords($_SESSION['user']); ?></div>
    <div class="navbar-nav bg-dark bg-opacity-25 pt-1 pb-2">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="<?= BASEURL; ?>/logout">Logout</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column  mx-2">

                    <?php if (isset($_SESSION['hotel_id'])) : ?>

                        <div class="fs-5 ms-3"><?= $_SESSION['hotel_name']; ?></div>

                        <li class="nav-item">
                            <form action="<?= BASEURL; ?>/hotel/switch" method="post">
                                <input type="hidden" name="hotel_id" value=null>
                                <button class="nav-link fs-6 mb-3 shadow border-0" aria-current="page">
                                    <span data-feather="home" class="align-text-bottom"></span>
                                    Switch Hotel
                                </button>
                            </form>
                        </li>

                </ul>


                <div class="mx-3">
                    <hr>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?= $data['submenu'] == 'dashboard' ? 'active' : ''; ?>" aria-current="page" href="<?= BASEURL; ?>/hotel/manage">
                            <span class="bi bi-layout-text-window-reverse align-text-bottom me-1"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $data['submenu'] == 'room' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/hotel/manage/room">
                            <span class="bi bi-file-earmark-text align-text-bottom me-1"></span>
                            Rooms
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $data['submenu'] == 'check in' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/hotel/manage/checkin">
                            <span class="bi bi-box-arrow-in-right align-text-bottom me-1"></span>
                            Check In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $data['submenu'] == 'check out' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/hotel/manage/checkout">
                            <span class="bi bi-box-arrow-right align-text-bottom me-1"></span>
                            Check Out
                        </a>
                    </li>

                </ul>

                <!-- ///////////////// -->

                <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Current month
                        </a>
                    </li>
                </ul> -->

                <hr>

            <?php endif; ?>

            <ul class="nav flex-column  mx-2">
                <li class="nav-item">
                    <a class="nav-link fs-6" aria-current="page" href="<?= BASEURL; ?>/">
                        <span data-feather="home" class="align-text-bottom"></span>
                        Back to Home
                    </a>
                </li>
            </ul>
            </div>
        </nav>