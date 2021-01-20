<?php include "header.php"; ?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Contact Us</h1>
                        </div>
                        <form class="user"  method="POST" action="<?php echo base_url('contact/update') ?>" enctype="multipart/form-data">
                          <input type="hidden" class="form-control form-control-user" id="txtId" name="txtId"  value="1">

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <textarea type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Input Address" value="<?= $settingInfo->address ?>"><?= $settingInfo->address ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                 <?php echo form_dropdown('provinsi',  $provinsidata, $provinsiselect, 'class="form-control input-lg-rounded" placeholder="Provinsi" id="province"'); ?>
                               </div>
                             </div>
                             <div class="form-group row">
                               <div class="col-sm-12 mb-3 mb-sm-0">
                                 <select class="form-control input-lg-rounded" id="city" name="oricity" required>
                                     <?php if (!$kotaselect) : ?>
                                         <option></option>
                                     <?php else : ?>
                                         <option value="<?= $kotaselect; ?>"><?= $kotanama; ?></option>
                                     <?php endif; ?>
                                 </select>
                               </div>
                             </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="txtPosCode" name="txtPosCode" placeholder="Input Pos Code" value="<?= $settingInfo->pos_code ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="txtWebName" name="txtWebName" placeholder="Input Web Name" value="<?= $settingInfo->web_name ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <textarea type="text" class="form-control" id="txtDesc" name="txtDesc" placeholder="Input Description" value="<?= $settingInfo->description ?>"><?= $settingInfo->description ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-12">
                                  <input type="file" class="input form-control-file" <?php echo form_error('image') ? 'is-invalid':'' ?> name="image">
                                  <div class="invalid-feedback">
                                      <?php echo form_error('image') ?>
                                  </div>
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="txtUrl" name="txtUrl" placeholder="Input Url" value="<?= $settingInfo->url ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="txtLat" name="txtLat" placeholder="Input Lattitude" value="<?= $settingInfo->lattitude ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="txtLong" name="txtLong" placeholder="Input Longitude" value="<?= $settingInfo->longitude ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" id="txtUrlMap" name="txtUrlMap" placeholder="Input Url Map" value="<?= $settingInfo->url_map ?>">
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

<script type="text/javascript">
    $(document).ready(function() {

        $('#province').change(function() {
            var idOld = $(this).val();
            var id = parseInt(idOld);
            // console.log(id);
            $.ajax({
                url: "<?php echo base_url() ?>contact/city",
                type: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    id_city = Object.keys(data);
                    city_name = Object.values(data);
                    console.log(data);

                    var html = '';
                    var i;
                    for (i = 0; i < id_city.length; i++) {
                        html += "<option value='" + id_city[i] + "-" + city_name[i] + "'>" + city_name[i] + "</option>";
                    }
                    $('#city').html(html);


                }
            });

            return false;
        });

    });
</script>
