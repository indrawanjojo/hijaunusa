<?php include "header.php"; ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Input Sub Category</h1>
                        </div>
                        <form class="user"  method="POST" action="<?php echo base_url('category/add_sub_category') ?>" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Input Name" value="<?php echo $subCategoryInfo->name ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <select class="form-control" id="id_category" name="id_category">
                                    <?php foreach($allCategory as $cat) : ?>
                                        <option value="<?php echo $cat->id;?>"> <?php echo $cat->title; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-user btn-block">Save</button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include "footer.php"; ?>

<script src="<?php echo base_url() ?>assets/js/script.js"></script>