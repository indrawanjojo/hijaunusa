<?php include "header.php"; ?>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Our Service || <a href="<?php echo base_url('home/insert_service') ?>"> Insert Service <i class="fas fa-plus"></i></a></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Synopsis</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Synopsis</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($serviceInfo as $serviceInfo) { ?>
                            <tr>
                                <td><?= $serviceInfo->id ?></td>
                                <td><?= $serviceInfo->title ?></td>
                                <td><?= $serviceInfo->synopsis ?></td>
                                <td><?= $serviceInfo->icon ?></td>
                                <td>
                                    <a href="<?php echo base_url('home/edit_service/') ?><?= $serviceInfo->id ?>" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

<?php include "footer.php"; ?>
