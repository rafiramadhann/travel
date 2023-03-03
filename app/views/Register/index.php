<div class="row justify-content-start h-100">
    <div class="col-md-5 pt-5 mt-4">
        <div class="my-5">
            <main class="form-signin w-100 m-auto">
                <form action="<?= BASEURL; ?>/register/cek" method="post">
                    <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus autocomplete="off" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="u_password" class="form-control rounded-0" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="c_password" class="form-control " id="floatingPassword" placeholder="Confirmation Password" required>
                        <label for="floatingPassword">Confirmation Password</label>
                    </div>

                    <button class="mt-3 w-100 btn btn-lg btn-primary" type="submit" name="submit">Register</button>

                    <small class="text-center d-block mt-3">Sudah punya akun? <a href="<?= BASEURL; ?>/login">Log in disini!</a></small>
                </form>
            </main>
        </div>
    </div>
</div>