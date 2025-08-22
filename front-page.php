<?php get_header(); ?>

<main class="water-shop-container">

  <!-- Banner -->
  <!-- <section class="hero-banner text-center text-white d-flex align-items-center justify-content-center" style="height: 400px; background: url('<?php echo get_template_directory_uri(); ?>/assets/img/banner.jpg') center/cover no-repeat;">
    <div>
      <h1>Chào mừng đến WaterShop</h1>
      <p>Khuyến mãi đặc biệt – Giảm 50% hôm nay</p>
      <a href="#" class="btn btn-primary">Mua ngay</a>
    </div>
  </section> -->
    <div class="banner">
        <?php
        // Elementor section
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </div>


    <!-- Sản phẩm hot -->
    <div class="featured-products">
        <?php get_template_part('template-parts/homepage/featured-products'); ?>
    </div>

    <!-- Ưu đãi / chính sách -->
    <section class="my-5 py-4 bg-light">
        <div class="row text-center">
        <div class="col-md-4">
            <i class="bi bi-truck display-4"></i>
            <h5>Miễn phí vận chuyển</h5>
            <p>Áp dụng cho đơn hàng từ 500k</p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-arrow-repeat display-4"></i>
            <h5>Đổi trả dễ dàng</h5>
            <p>Hỗ trợ đổi trả trong 7 ngày</p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-shield-check display-4"></i>
            <h5>Thanh toán an toàn</h5>
            <p>Bảo mật tuyệt đối thông tin khách hàng</p>
        </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>