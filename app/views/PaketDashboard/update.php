<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= ucwords($data['submenu']); ?></h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                        This week
                    </button>
    </div> -->
    </div>

    <div id="dashboardContent">

        <div class="fs-4 text-center mb-3 heading-section">Update Paket</div>

        <div class="row text-center">

            <div class="col-md-6">
                <img src="<?= BASEURL; ?>/img/<?= $data['paket']['image']; ?>" alt="" class="mw-100" style="max-height:500px">

                <form action="<?= BASEURL; ?>/paket/manage/up" method="post" enctype="multipart/form-data">

                    <div class="my-3 mx-0 p-0">
                        <input class="form-control form-control-sm" type="file" id="image" name="image" accept="image/*" onchange="readURL(this)">
                    </div>

                    <img id="img-preview" src="https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png" width="250px" />
            </div>

            <div class="col-md-6">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="paket_name" value="<?= $data['paket']['name']; ?>" autofocus>
                    <label for="name">Nama Paket</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="paket_slug" value="<?= $data['paket']['slug']; ?>" readonly>
                    <label for="slug">Slug Paket</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="price" id="price" placeholder="paket_price" value="<?= $data['paket']['price']; ?>">
                    <label for="price">Harga Paket</label>
                </div>

                <div class="form-floating mb-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="daerah_id" name="daerah_id" aria-label="Floating label select example">
                            <option disabled>Pilih Daerah</option>
                            <?php foreach ($data['daerah'] as $daerah) : ?>
                                <option value="<?= $daerah['daerah_id']; ?>" <?= $daerah['daerah_id'] == $data['paket']['daerah_id'] ? 'selected' : ''; ?>><?= $daerah['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="daerah_id">Daerah</label>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a promotion here" id="promotion" name="promotion" style="height: 100px"><?= $data['paket']['promosi']; ?>
                </textarea>
                    <label for="promotion">Promosi</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a description here" id="description" name="description" style="height: 100px"><?= $data['paket']['description']; ?>
                </textarea>
                    <label for="description">Deskripsi</label>
                </div>

            </div>


            <div class="row justify-content-center">
                <input type="hidden" name="old_image" value="<?= $data['paket']['image']; ?>">
                <input type="hidden" name="id" value="<?= $data['paket']['id']; ?>">

                <div class="col-md-2 my-3">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Update Paket</button>
                </div>
            </div>


            </form>

        </div>

    </div>

</main>

<script>
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    name.addEventListener("keyup", function() {
        let preslug = name.value;
        preslug = preslug.replace(/ /g, "-");
        slug.value = preslug.toLowerCase();
    });

    function readURL(input) {
        console.log(input.files);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#img-preview").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            $("#img-preview").attr("src", noimage);
        }
    }
</script>
