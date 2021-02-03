<?php include "header.php"; ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Input Service</h1>
                        </div>
                        <form class="user"  method="POST" action="<?php echo base_url('home/add_service') ?>" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="txtTitle" name="txtTitle" placeholder="Input Title" value="<?php echo $serviceInfo->title ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <textarea type="text" class="form-control form-control-user" id="txtSynopsis" name="txtSynopsis" placeholder="Input Synopsis" value="<?php echo $serviceInfo->synopsis ?>"><?php echo $serviceInfo->synopsis ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="txtIcon" name="txtIcon" placeholder="Input Icon" value="<?php echo $serviceInfo->icon ?>">
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
