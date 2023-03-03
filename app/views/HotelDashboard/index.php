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
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <h5 class="card-header bg-warning bg-opacity-75">Total Room</h5>
                    <div class="card-body text-end">
                        <div class="align-self-center fs-1"><?= count($data['allrooms']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5 class="card-header bg-danger bg-opacity-75">Used Room</h5>
                    <div class="card-body text-end">
                        <div class="align-self-center fs-1"><?= count($data['usedrooms']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5 class="card-header bg-success bg-opacity-75">Unused Room</h5>
                    <div class="card-body text-end">
                        <div class="align-self-center fs-1">
                            <?= count($data['allrooms']) -
                                count($data['usedrooms']); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>