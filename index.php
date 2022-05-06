<?php include __DIR__ . '/functions.php'; ?>

<?php include __DIR__ . '/inc/header.php'; ?>


<div class="hero_area">
  <div class="hero_bg_box">
    <img src="images/hero-bg.jpg" alt="">
  </div>
  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="./index.php">
          <span>
            Eatveg
          </span>
        </a>
        <div class="" id="">
          <div class="container">
            <div class=" mr-auto flex-column flex-lg-row align-items-center">
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->
  <!-- slider section -->
  <section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                  <h5>
                    01
                  </h5>
                  <h1>
                    Fresh <br />
                    Vegetables
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                  <h5>
                    02
                  </h5>
                  <h1>
                    Fresh <br />
                    Vegetables
                  </h1>
                  <a href="" class="">
                    buy Now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ol class="carousel-indicators">
        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
        <li data-target="#customCarousel1" data-slide-to="1"></li>
      </ol>
    </div>
  </section>
  <!-- end slider section -->
</div>

<!-- veg section -->

<section class="veg_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Our Vegetables
      </h2>
      <p>
        which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't an
      </p>
    </div>
    <?php include __DIR__ . '/inc/-vegetables.php'; ?>
  </div>
</section>

<!-- end veg section -->

<!-- footer section -->
<section class="container-fluid footer_section">
  <div class="footer-info border-0">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="javascript:void();">EATVEG</a>
    </p>
  </div>
</section>
<!-- end  footer section -->

<?php include __DIR__ . '/inc/footer.php'; ?>