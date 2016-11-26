<?php get_header() ?>

<h1>Bem vindo!</h1>

<?php if(have_posts()) :?>

    <?php while(have_posts()) :?>
        <?php the_post() ?>

        <h2><?php the_title() ?></h2>

        <p><?php the_content() ?></p>
    <?php endwhile ?>

<?php endif ?>

<?php get_footer() ?>
