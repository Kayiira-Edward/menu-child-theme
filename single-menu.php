<section class="menu-single">
    <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="menu-thumbnail">
                <?php if(has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>
            </div>
            <h1><?php the_title(); ?></h1>
            <div class="menu-content">
                <?php the_content(); ?>
            </div>
            <div class="menu-meta">
                <p><strong>Client: </strong><?php the_field('client'); ?></p>
                <p><strong>Comment: </strong><?php the_field('comment'); ?></p>
            </div>
            <a href="<?php echo get_post_type_archive_link('menu');?>">Back to menu</a>
            </article>
    <?php endwhile; else : ?>
        <p>No menu item found.</p>
    <?php endif; ?>
</section>