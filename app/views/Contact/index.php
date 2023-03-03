<div class="row justify-content-end h-100">
    <div class="col-md-5 pt-5 mt-5">
        <div class="mt-5 fs-3">

            <div class="px-2 fs-2"><u>About Us</u></div>

            <?php $sadmin = $data['sadmin'] ?>

            <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td>Address</td>
                    <td>: <?= $sadmin['alamat']; ?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>: <?= $sadmin['no_telp']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: <?= $sadmin['email']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>