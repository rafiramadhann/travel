<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="text-center my-5">Lupa Password</h1>
    </div>
</div>

<div class="row justify-content-evenly">
    <div class="col-md-5">
        <div class="border rounded p-3 shadow">
            <form action="<?= BASEURL; ?>/remember/up" method="POST">
                <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">
                <div class="row justify-content-center">
                    <div class="col-md-10 py-3">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="email" id="email" autocomplete="off" placeholder="Name" autofocus required>
                            <label for="email">Email</label>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="n_password" id="n_password" autocomplete="off" placeholder="Current Password" required>
                                <label for="n_password">New Password</label>
                            </div>
                            <span class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" id="check2" aria-label="Checkbox for following text input">
                                <span class="px-1"><label for="check2"><i class="bi bi-eye" id="show-p2"></i></label></span>
                            </span>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="cn_password" id="cn_password" autocomplete="off" placeholder="Confirmation Password" required>
                                <label for="cn_password">Confirmation Password</label>
                            </div>
                            <span class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" id="check3" aria-label="Checkbox for following text input">
                                <span class="px-1"><label for="check3"><i class="bi bi-eye" id="show-p3"></i></label></span>
                            </span>
                        </div>

                        <button class="btn btn-secondary mx-auto d-block mt-3" type="submit" name="submit">Reset Password</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>