<footer id="footer" class="section-bg">
  <div class="footer-top">
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <div class="footer-newsletter">
            <h4>About Us</h4>
            <p><?= $contactUsList->description ?></p>
          </div>

          <div class="footer-links">
            <h4>Contact Us</h4>
            <p><?= $contactUsList->address ?> <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="social-links">
            <?php foreach ($sosmedList as $sosmedList) {?>
              <a href="<?= $sosmedList->url ?>" class="<?= $sosmedList->name ?>"><?= $sosmedList->icon ?></a>
            <?php } ?>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="footer-newsletter">
            <h4>Information</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem.</p>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3">
          <h4>Address Maps</h4>
          <div class="mapouter">
            <div class="gmap_canvas">
              <iframe width="300" height="250" id="gmap_canvas" src="<?= $contactUsList->url_map ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
              </iframe>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>Hijau Nusa Flooring</strong> 2021. All Rights Reserved
    </div>
    <div class="credits">
      Powered by <a href="#">Grow Technology</a>
    </div>
  </div>
</footer><!-- #footer -->

<!-- <style>
		    #floating-button{
		        width: 55px;
		        height: 55px;
		        border-radius: 50%;
		        background: #db4437;
		        position: fixed;
		        bottom: 30px;
		        right: 30px;
		        cursor: pointer;
		        box-shadow: 0px 2px 5px #666;
		        background: url(<?php echo base_url('assets') ?>/images/wa-blue.png);
		        background-size:cover;
		        background-repeat:no-repeat;
		        z-index:9999;
		    }
		    #floating-button:hover{
		        border:2px solid white;
		    }
		</style>
		<a href="https://web.whatsapp.com/send?phone=628115201190&text=Saya ingin mengetahui informasi lebih lanjut tentang barang-barang di Tokuonline" target="_blank" id="floating-button" title="Whatsapp"></a> -->
<style>
  .back-to-top i {
      padding-top: 5px;
      color: #fff;
      font-size: 35px;
  }
</style>
<a href="https://api.whatsapp.com/send?phone=6282298190700&text=Hai%20Admin,%20Saya%20ingin%20mengetahui%20informasi%20lebih%20lanjut%20tentang%20barang%20-%20barang%20di%20Hijau Nusa Flooring" target="_blank" class="back-to-top"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>

<!-- JavaScript Libraries -->
<script src="<?php echo base_url('assets') ?>/lib/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/jquery/jquery-migrate.min.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/easing/easing.min.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/mobile-nav/mobile-nav.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/wow/wow.min.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/waypoints/waypoints.min.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/counterup/counterup.min.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/isotope/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url('assets') ?>/lib/lightbox/js/lightbox.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="<?php echo base_url('assets') ?>/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="<?php echo base_url('assets') ?>/js/main.js"></script>

</body>
</html>
