<div class="row">
    <div class="col">
        <div class="text-center fs-2 mt-3 heading-section mb-5">
            Profile
        </div>
    </div>
</div>

<div class="row justify-content-evenly">
    <div class="col-md-5">
        <div class="border rounded p-3 shadow">
            <form action="<?= BASEURL; ?>/profile/upr" method="POST">
                <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">
                <div class="row justify-content-center">
                    <div class="col-md-10 py-3">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="u_name" id="u_name" autocomplete="off" placeholder="Name" value="<?= isset($data['user']['u_name']) ? $data['user']['u_name'] : ''; ?>" required>
                            <label for="u_name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Username" maxlength="20" value="<?= isset($data['user']['username']) ? $data['user']['username'] : ''; ?>" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="no_telp" id="no_telp" autocomplete="off" placeholder="No. Telp" value="<?= isset($data['user']['no_telp']) ? $data['user']['no_telp'] : ''; ?>" required maxlength=13>
                            <label for="no_telp">No. Telp</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email" value="<?= isset($data['user']['email']) ? $data['user']['email'] : ''; ?>" required>
                            <label for=" email">Email</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" autocomplete="off" placeholder="Alamat" name="alamat" id="alamat" style="height: 100px" required><?= isset($data['user']['alamat']) ? $data['user']['alamat'] : ''; ?></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                        <button class="btn btn-secondary mx-auto d-block mt-3" type="submit" name="submit">Update Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-5">
        <div class="border rounded p-3 shadow">
            <form action="<?= BASEURL; ?>/profile/upp" method="POST">
                <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">
                <div class="row justify-content-center">
                    <div class="col-md-10 py-3">

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="u_password" id="u_password" autocomplete="off" placeholder="Current Password">
                                <label for="u_password">Current Password</label>
                            </div>
                            <span class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" id="check1" aria-label="Checkbox for following text input">
                                <span class="px-1"><label for="check1"><i class="bi bi-eye" id="show-p1"></i></label></span>
                            </span>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="n_password" id="n_password" autocomplete="off" placeholder="Current Password">
                                <label for="n_password">New Password</label>
                            </div>
                            <span class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" id="check2" aria-label="Checkbox for following text input">
                                <span class="px-1"><label for="check2"><i class="bi bi-eye" id="show-p2"></i></label></span>
                            </span>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="cn_password" id="cn_password" autocomplete="off" placeholder="Confirmation Password">
                                <label for="cn_password">Confirmation Password</label>
                            </div>
                            <span class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" id="check3" aria-label="Checkbox for following text input">
                                <span class="px-1"><label for="check3"><i class="bi bi-eye" id="show-p3"></i></label></span>
                            </span>
                        </div>

                        <button class="btn btn-secondary mx-auto d-block mt-3" type="submit" name="submit">Update Password</button>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
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