<div class="row justify-content-center my-5">
    <div class="row">
        <div class="col">
            <div class="fs-2 text-center">Super Admin</div>
        </div>
    </div>
    <div class="col-md-10 rounded p-3 shadow">
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Username</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">No Telp</th>
                    <th class="text-center" scope="col">Alamat</th>
                    <th class="text-center" scope="col">Otoritas</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php $sadmin = $data['sadmins'];
                $no = 1; ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $sadmin['u_name']; ?></td>
                    <td><?= $sadmin['username']; ?></td>
                    <td><?= $sadmin['email']; ?></td>
                    <td><?= $sadmin['no_telp']; ?></td>
                    <td><?= $sadmin['alamat']; ?></td>
                    <td><?= ($sadmin['is_admin'] == 2) ? 'Super Admin' : 'User'; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Admins -->
<div class="row justify-content-center my-5">
    <div class="row">
        <div class="col">
            <div class="fs-2 text-center">Admin</div>
        </div>
    </div>
    <div class="col-md-10 rounded p-3 shadow">
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Username</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">No Telp</th>
                    <th class="text-center" scope="col">Alamat</th>
                    <th class="text-center" scope="col">Otoritas</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php $admins = $data['admins'];
                $no = 1;
                if ($admins) :
                    foreach ($admins as $admin) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $admin['u_name']; ?></td>
                            <td><?= $admin['username']; ?></td>
                            <td><?= $admin['email']; ?></td>
                            <td><?= $admin['no_telp']; ?></td>
                            <td><?= $admin['alamat']; ?></td>
                            <td>
                                <a href="" class="isAdminEdit" data-id="<?= $admin['id']; ?>" data-admin="<?= $admin['is_admin']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal"><?= $admin['is_admin'] == 1 ? 'Admin' : 'User'; ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?> <?php else : ?>
                    <tr>
                        <td colspan="7">
                            <span class="text-center d-block m-3 fs-3">
                                Admin tidak ditemukan!
                            </span>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Normal Users -->
<div class="row justify-content-center my-5">
    <div class="row">
        <div class="col">
            <div class="fs-2 text-center">Users</div>
        </div>
    </div>
    <div class="col-md-10 rounded p-3 shadow">
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Username</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">No Telp</th>
                    <th class="text-center" scope="col">Alamat</th>
                    <th class="text-center" scope="col">Otoritas</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php $users = $data['users'];
                $no = 1;
                if ($users) :
                    foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $user['u_name']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['no_telp']; ?></td>
                            <td><?= $user['alamat']; ?></td>
                            <td>
                                <a href="" class="isAdminEdit" data-id="<?= $user['id']; ?>" data-admin="<?= $user['is_admin']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal"><?= $user['is_admin'] == 1 ? 'Admin' : 'User'; ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">
                            <span class="text-center d-block m-3 fs-3">
                                User tidak ditemukan!
                            </span>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/user/update" method="post">
                <input type="hidden" name="id" value="id">
                <div class="modal-body text-center d-flex justify-content-evenly">
                    <div class="fs-5 d-inline">
                        <input type="radio" name="is_admin" value="1" val="1" class="mx-1 is_admin" disabled required>Select One:
                    </div>
                    <div class="fs-5 d-inline">
                        <input type="radio" name="is_admin" id="is_admin1" value="1" val="1" class="mx-1 is_admin">Admin
                    </div>
                    <div class="fs-5 d-inline">
                        <input type="radio" name="is_admin" id="is_admin2" value="0" val="0" class="mx-1 is_admin">User
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>