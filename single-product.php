<?php get_header(); ?>
<?php 
var_dump(get_the_ID());
?>
<main class="container my-5">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        $gallery = get_post_meta( get_the_ID(), '_product_gallery', true ); 
        $gallery_ids = $gallery ? explode(',', $gallery) : [];
    ?>
        <div class="row">
            <!-- Cột ảnh -->
            <div class="col-md-6">
                <div class="row">
                    <!-- Ảnh lớn -->
                    <div class="col-9 mb-3">
                        <?php if (!empty($gallery_ids)) : 
                            $first_id = $gallery_ids[0]; // ảnh đầu tiên
                        ?>
                            <img id="main-product-image" 
                                 src="<?php echo wp_get_attachment_image_url($first_id, 'large'); ?>" 
                                 class="img-fluid rounded shadow w-100">
                        <?php else : ?>
                            <p>Chưa có ảnh sản phẩm</p>
                        <?php endif; ?>
                    </div>

                    <!-- Thumbnails -->
                    <div class="col-3 d-flex flex-column gap-2">
                        <?php foreach ($gallery_ids as $id) : ?>
                            <img src="<?php echo wp_get_attachment_image_url($id, 'thumbnail'); ?>" 
                                 class="img-thumbnail gallery-thumb" 
                                 style="cursor:pointer"
                                 data-large="<?php echo wp_get_attachment_image_url($id, 'large'); ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Cột thông tin -->
            <div class="col-md-6">
                <h1 class="mb-3"><?php the_title(); ?></h1>
                
                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                <div class="mb-3 text-muted fs-5">
                    <strong>Giá: </strong> 
                    <?php echo $price ? number_format( (int)$price, 0, ',', '.' ) . '₫' : 'Liên hệ'; ?>
                </div>

                <div class="mb-4">
                    <?php the_content(); ?>
                </div>

                <form method="post" action="/cart">
                    <input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        Thêm vào giỏ hàng
                    </button>
                </form>
            </div>
        </div>
    <?php endwhile; endif; ?>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const thumbs = document.querySelectorAll('.gallery-thumb');
    const mainImg = document.getElementById('main-product-image');

    thumbs.forEach(thumb => {
        thumb.addEventListener('click', function() {
            mainImg.src = this.dataset.large; // đổi src ảnh lớn
        });
    });
});
</script>

<?php get_footer(); ?>
