<div class="cat-wrapper">
  <?php
  $args = array(
    'tax_query' => array(
      'relation' => 'AND',
      array(
        'taxonomy' => 'product_cat',
        'field' => 'slug',
        'terms' => 'vebinary'
      )
    ),
    'posts_per_page' => 20, 
    'post_type' => 'product', 
    'orderby' => 'title',
  );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    global $product;
    ?>
    <div class="children__item">
      <div class="children__image">
        <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
          <img class="img" src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="">
        </a>
      </div>
      <a class="children__title" href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a>
    </div>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
</div>