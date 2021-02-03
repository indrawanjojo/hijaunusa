<?php include "header.php"; ?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Input Product</h1>
                        </div>
                        <form class="user"  method="POST" action="<?php echo base_url('product/update') ?>" enctype="multipart/form-data">
                          <input type="hidden" class="form-control form-control-user" id="txtIDProduct" name="txtIDProduct" value="<?php echo $productInfo->id_product ?>">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="txtName" name="txtName" placeholder="Input Name" value="<?= $productInfo->name ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-12">
                                  <textarea type="text" class="form-control form-control-user" id="txtSynopsis" name="txtSynopsis" placeholder="Input Synopsis" value="<?= $productInfo->synopsis ?>"><?= $productInfo->synopsis ?></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-12">
                                  <textarea type="text" class="form-control form-control-user" id="txtDesc" name="txtDesc" placeholder="Input Description" value="<?= $productInfo->description ?>"><?= $productInfo->description ?></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-12 mb-3 mb-sm-0">
                                  <input type="number" class="form-control form-control-user" id="txtPrice" name="txtPrice" placeholder="Input Price" value="<?= $productInfo->price ?>">
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <select class="form-control" id="id_category" name="id_category">
                                        <?php
                                        foreach ($allCategory as $listCategoryLookup) {
                                            if ($listCategoryLookup->id == $categorySelect->id) {
                                                echo '<option selected="selected" value="' . $categorySelect->id . '">' . $categorySelect->title . '</option>';
                                            } else {
                                                echo '<option value="' . $listCategoryLookup->id . '">' . $listCategoryLookup->title . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="custom-file mb-3">
                                        <input type="hidden" name="old_image" value="<?= $productInfo->image; ?>">
                                        <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" data-filename="<?= $productInfo->image; ?>" name="image">
                                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                    </div>
                                    <?php if (!$productInfo->image == '') { ?>
                                        <br />
                                        <img class="rounded mx-auto d-block shadow-lg p-3 mb-n5 bg-white rounded" id="img" for="img" src="<?php echo base_url('gallery_img/'.$productInfo->image) ?>" style="max-width: 300px;" />
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

<script type="text/javascript">
  var _notif = '<?php echo $this->cls_general->encryptStr($notif, 'd') ?>';

  window.onload = function() {
    debugger;
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    if (_notif != '') {
      Toast.fire({
        type: 'info',
        title: _notif
      })
    }

  }
</script>

<?php include "footer.php"; ?>
<script src="<?php echo base_url() ?>assets/js/script.js"></script>
