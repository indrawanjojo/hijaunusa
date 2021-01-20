<?php include "header.php"; ?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update Product</h1>
                        </div>
                        <form class="user"  method="POST" action="<?php echo base_url('home/banner_update') ?>" enctype="multipart/form-data">
                          <input type="hidden" class="form-control form-control-user" id="txtIDBanner" name="txtIDBanner" value="<?php echo $bannerInfo->id_banner ?>">
                          <div class="form-group row">
                              <div class="col-sm-12 mb-3 mb-sm-0">
                                  <input type="text" class="form-control form-control-user" id="txtTitle" name="txtTitle" placeholder="Input Title" value="<?= $bannerInfo->title ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <textarea type="text" class="form-control form-control-user" id="txtDesc" name="txtDesc" placeholder="Input Description" value="<?= $bannerInfo->description ?>"><?= $bannerInfo->description ?></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-sm-12">
                                  <div class="custom-file mb-3">
                                      <input type="hidden" name="old_image" value="<?= $bannerInfo->image; ?>">
                                      <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" data-filename="<?= $bannerInfo->image; ?>" name="image">
                                      <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                  </div>
                                  <?php if (!$bannerInfo->image == '') { ?>
                                      <br />
                                      <img class="rounded mx-auto d-block shadow-lg p-3 mb-n5 bg-white rounded" id="img" for="img" src="<?php echo base_url('gallery_img/'.$bannerInfo->image) ?>" style="max-width: 300px;" />
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
