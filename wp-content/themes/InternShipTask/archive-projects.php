<?php get_header(); ?>
<div class="projects">
    <?php if (have_posts()) : while (have_posts()) : the_post(); 
        $client = get_post_meta(get_the_ID(), '_client_name', true);
        $deadline = get_post_meta(get_the_ID(), '_project_deadline', true);
        $status = get_post_meta(get_the_ID(), '_project_status', true);
        $status_color = ['Not Started' => 'red', 'In Progress' => 'orange', 'Completed' => 'green'][$status];
    ?>
        <div class="project">
            <h2><?php the_title(); ?></h2>
            <?php the_post_thumbnail(); ?>
            <p><strong>Client:</strong> <?= esc_html($client) ?></p>
            <p><strong>Deadline:</strong> <?= esc_html($deadline) ?></p>
            <p><strong>Status:</strong> <span style="color: <?= $status_color ?>;"><?= $status ?></span></p>
        </div>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
<!-- for this to be display use this http://wordpress.test/projects/ -->
