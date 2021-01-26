<?php include "header.php"; ?>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Visitor</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>IP Address</th>
                              <th>Date</th>
                              <th>Hits Record</th>
                              <th>Device</th>
                              <th>OS</th>
                              <th>Browser</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>IP Address</th>
                              <th>Date</th>
                              <th>Hits Record</th>
                              <th>Device</th>
                              <th>OS</th>
                              <th>Browser</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($visitorInfo as $visitorInfo) { ?>
                            <tr>
                                <td><?= $visitorInfo->ip_address ?></td>
                                <td><?= $visitorInfo->time ?></td>
                                <td><?= $visitorInfo->hits ?></td>
                                <td><?= $visitorInfo->user_agent ?></td>
                                <td><?= $visitorInfo->os ?></td>
                                <td><?= $visitorInfo->browser ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

<?php include "footer.php"; ?>
