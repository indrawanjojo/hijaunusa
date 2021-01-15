<?php include "header.php"; ?>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sub Category || <a href="<?php echo base_url('category/insert_sub') ?>"> Insert Sub Category <i class="fas fa-plus"></i></a></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($allSubCategory as $allSubCategory) { ?>
                            <tr>
                                <td><?= $allSubCategory->id_sub ?></td>
                                <td><?= $allSubCategory->name ?></td>
                                <td><?= $allSubCategory->title ?></td>
                                <td>
                                    <a href="<?php echo base_url('category/edit_sub/') ?><?= $allSubCategory->id_sub ?>" class="btn btn-info btn-circle btn-sm">
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