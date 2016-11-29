<?php get_header() ?>

<main class="pagina-main">

    <article class="pagina">

        <h1 class="pagina-titulo">
            <?php the_title() ?>
        </h1>

        <?php if(have_posts()) :?>
            <?php while(have_posts()) :?>

                <?php the_post() ?>

                <div class="pagina-conteudo">
                    <?php the_content() ?>
                </div>

            <?php endwhile ?>
        <?php endif ?>
    </article>

</main>

<?php get_footer() ?>
