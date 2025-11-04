<section class="menu-archive">
    <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <div class="menu-thumbnail">
                <?php if(has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php endif; ?>
            </div>
            <h2><?php the_title(); ?></h2>
            <p><strong>Client: </strong><?php the_field('client'); ?></p>
            <p><strong>Comment: </strong><?php the_field('comment'); ?></p>
            <a href="<?php the_permalink(); ?>">View More</a>
        </article>
        <?php endwhile; else : ?>
            <p>No menu items found.</p>
    <?php endif; ?>
</section>