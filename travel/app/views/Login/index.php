<div class="row justify-content-start h-100">
    <div class="col-md-5 pt-5 mt-5">
        <div class="my-5">
            <main class="form-signin w-100 m-auto">
                <form action="<?= BASEURL; ?>/login/auth" method="POST">
                    <h1 class="h3 mb-3 fw-normal text-center">Log in</h1>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="floatingInput" required placeholder="name@example.com" autofocus autocomplete="off">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="u_password" class="form-control" id="floatingPassword" required placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="mt-3 w-100 btn btn-lg btn-primary" type="submit" name="submit">Log in</button>

                    <small class="text-center d-block mt-3">Belum punya akun? <a href="<?= BASEURL; ?>/register">Daftar disini!</a></small>
                    <small class="text-center d-block mt-3 text-decoration-underline"><a href="<?= BASEURL; ?>/remember">Lupa Password</a></small>
                </form>
            </main>
        </div>
    </div>
</div>