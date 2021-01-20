<?php include "header.php"; ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update Content</h1>
                        </div>
                        <form class="user"  method="POST" action="<?php echo base_url('gallery/update_gallery_content') ?>" enctype="multipart/form-data">
                            <div class="form-group row">
                            <input type="hidden" class="form-control form-control-user" id="txtIDGal" name="txtIDGal" placeholder="Input Title" value="<?php echo $galleryInfo->id_gallery ?>">

                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="txtTitle" name="txtTitle"
                                        placeholder="Input Title" value="<?php echo $galleryInfo->title ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea type="text" class="form-control form-control-user" id="txtSynopsis" name="txtSynopsis" placeholder="Input Synopsis" value="<?php echo $galleryInfo->synopsis ?>"><?php echo $galleryInfo->synopsis ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <textarea type="text" class="form-control form-control-user" id="txtDesc" name="txtDesc" placeholder="Input Description" value="<?php echo $galleryInfo->description ?>"><?php echo $galleryInfo->description ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="custom-file mb-3">
                                        <input type="hidden" name="old_image" value="<?= $galleryInfo->image; ?>">
                                        <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" data-filename="<?= $galleryInfo->image; ?>" name="image">
                                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                    </div>
                                    <?php if (!$galleryInfo->image == '') { ?>
                                        <br />
                                        <img class="rounded mx-auto d-block shadow-lg p-3 mb-n5 bg-white rounded" id="img" for="img" src="<?php echo base_url('gallery_img/'.$galleryInfo->image) ?>" style="max-width: 300px;" />
                                        <br />
                                        <br />
                                    <?php } ?>
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
