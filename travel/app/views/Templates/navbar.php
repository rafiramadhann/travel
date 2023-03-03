<nav class="navbar sticky-top navbar-expand-lg bg-light shadow">

    <div class="container">
        <a class="navbar fs-1" href="<?= BASEURL; ?>/">
            <img src="<?= BASEURL; ?>/img/logo.jpeg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            PT.(INTENS)</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse m" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item fs-5 px-1">
                    <a class="under nav-link <?= $data['active'] == 'Home' ? 'active' : ''; ?>" aria-current="page" href="<?= BASEURL; ?>/">Beranda</a>
                </li>
                <li class="nav-item fs-5 px-1">
                    <a class="under nav-link <?= $data['active'] == 'Daftar Paket' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/paket">Paket Wisata</a>
                </li>
                <li class="nav-item fs-5 px-1">
                    <a class="under nav-link <?= $data['active'] == 'Daftar Hotel' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/hotel">Hotel</a>
                </li>
                <li class="nav-item fs-5 px-1">
                    <a class="under nav-link <?= $data['active'] == 'Contact Us' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/contact">Contact</a>
                </li>
                <?php if (isset($_SESSION['data'])) : ?>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle fs-5 <?= $data['active'] == 'Profile' ? 'active' : ''; ?>" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= ucwords($_SESSION['user']); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= BASEURL; ?>/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="<?= BASEURL; ?>/reservasi">Reservation</a></li>
                            <li>
                            <li><a class="dropdown-item" href="<?= BASEURL; ?>/history">History</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php if ($_SESSION['type'] > 0) : ?>
                                <li><a class="dropdown-item" href="<?= BASEURL; ?>/hotel/manage">Hotel Management</a></li>
                                <li><a class="dropdown-item" href="<?= BASEURL; ?>/paket/manage">Package Management</a></li>
                                <?php if ($_SESSION['type'] == 2) : ?>
                                    <li><a class="dropdown-item" href="<?= BASEURL; ?>/user/manage">User Management</a></li>
                                <?php endif; ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?= BASEURL; ?>/logout">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class=" nav-item fs-5 px-1">
                        <a class="under nav-link <?= $data['active'] == 'Login' ? 'active' : ''; ?>" href="<?= BASEURL; ?>/login">Log In</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>