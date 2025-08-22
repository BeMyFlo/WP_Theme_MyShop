<section class="my-5">
    <h2 class="text-center mb-4">Sản phẩm nổi bật</h2>
    <div class="row">
      <?php
      $args = [
        'post_type' => 'product',
        'posts_per_page' => 4,
      ];
      $hot_products = new WP_Query($args);

      if ($hot_products->have_posts()) :
        while ($hot_products->have_posts()) : $hot_products->the_post(); ?>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                </a>
              <?php endif; ?>
              <div class="card-body text-center">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">Xem chi tiết</a>
              </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      else : ?>
        <p class="text-center">Chưa có sản phẩm nào.</p>
      <?php endif; ?>
    </div>
</section>    