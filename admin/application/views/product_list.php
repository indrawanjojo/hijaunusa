<?php include "header.php"; ?>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product || <a href="<?php echo base_url('product/insert') ?>"> Insert Product</a></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Synopsis</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Synopsis</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($productList as $productList) { ?>
                            <tr>
                                <td><?= $productList->id_product ?></td>
                                <td><?= $productList->name ?></td>
                                <td><?= $productList->synopsis ?></td>
                                <td><?= $productList->description ?></td>
                                <td>Rp<?= number_format($productList->price) ?></td>
                                <td><img src="<?php echo base_url('gallery_img/') ?><?= $productList->image ?>" width="100"></td>
                                <td>
                                    <a href="<?php echo base_url('product/edit/') ?><?= $productList->id_product ?>" class="btn btn-info btn-circle btn-sm">
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
