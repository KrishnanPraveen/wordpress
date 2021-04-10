<?php get_header(); ?>
    <?php 
        $blog_posts = new WP_Query( array( 
            'post_type' => 'post', 
            'post_status' => 'publish', 
            'posts_per_page' => -1 
        ));
    ?>
    <?php if ( $blog_posts -> have_posts() ) : ?>
        <div class="blog-posts">
            <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
                <article id="post-<?php the_ID(); ?>">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="" srcset="">
                      <?php  } ?>
                        <h2 class="post-title"><?php the_title(); ?></h2>
                    </a>
                    <div class="post-category">
                        <?php the_category(', '); ?>
                    </div>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <span class="post-read-more">
                        <a href="<?php the_permalink(); ?>" target="_blank">
                            <?php echo esc_html__( 'Read more' ) ?>
                        </a>
                    </span> 
                </article>
            <?php endwhile; ?>
        </div> 
    <?php else: ?>
        <p class="no-blog-posts">
            <?php esc_html_e('Sorry, no posts matched your criteria.', 'theme-domain'); ?> 
        </p>
    <?php endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>