<?php include "header.php"; ?>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Main Banner</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($bannerList as $bannerList) { ?>
                            <tr>
                                <td><?= $bannerList->id_banner ?></td>
                                <td><?= $bannerList->title ?></td>
                                <td><?= $bannerList->description ?></td>
                                <td><img src="<?php echo base_url('gallery_img/') ?><?= $bannerList->image ?>" width="100"></td>
                                <td>
                                    <a href="<?php echo base_url('banner/edit/') ?><?= $bannerList->id_banner ?>" class="btn btn-info btn-circle btn-sm">
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