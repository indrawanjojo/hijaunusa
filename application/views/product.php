<?php include "header.php"; ?>

  <section id="portfolio" class="section-bg" style="padding-top: 125px;">
    <div class="container">

      <header class="section-header">
        <h3 class="section-title">Our Products</h3>
      </header>

      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">Selamat datang di Website Official Hijau Nusa Flooring, temukan produk favoritmu disini</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        <?php foreach ($productList as $productList) { ?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url('admin/gallery_img/') ?><?= $productList->image ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">App 1</a></h4>
                <p>App</p>
                <div>
                  <a href="<?php echo base_url('assets/') ?>img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>

      </div>

    </div>
  </section><!-- #portfolio -->

<?php include "footer.php"; ?>
