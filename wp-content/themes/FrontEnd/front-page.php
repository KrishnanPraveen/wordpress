<?php get_header(); ?>
    <main>
        <section class="slider_section">
            <?php
                $sliderHome = new WP_Query(array(
                    'post_type' => 'home_slider',
                    'posts_per_page' => '-1',
                    'order' => 'ASC'
                ));
                $posts = $sliderHome->posts;
            ?>
            <div class="slider_container">
                <?php foreach( $posts as $post ) { ?>
                    <div class="slider_item pos-rel">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        <div class="slider_content v-center pos-abs">
                            <div class="wrapper">
                                <h1 class="mb-10"><?php the_field('slider_title'); ?></h1>
                                <p><?php the_field('slider_content'); ?></p>
                                <a href="<?php the_field('slider_button_link'); ?>" class="btn btn-hover">know more</a>
                            </div>
                        </div>
                    </div>
                <?php } wp_reset_postdata();?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>