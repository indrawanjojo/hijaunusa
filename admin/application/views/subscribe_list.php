<?php include "header.php"; ?>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Subscriber</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Subscriber Name</th>
                              <th>Email</th>
                              <th>Date Subscribe</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Subscriber Name</th>
                                <th>Email</th>
                                <th>Date Subscribe</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($subscribeInfo as $subscribeInfo) { ?>
                            <tr>
                                <td><?= $subscribeInfo->id ?></td>
                                <td><?= $subscribeInfo->name ?></td>
                                <td><?= $subscribeInfo->email ?></td>
                                <td><?= $subscribeInfo->created ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

<?php include "footer.php"; ?>
