<?php get_header() ?>

    <?php if(have_posts()) :?>
        <?php while(have_posts()) :?>
            <?php the_post() ?>
            <div class="single-imovel-thumbnail">
                <?php the_post_thumbnail() ?>
            </div>
            <div class="container">
                <section class="chamada-principal">
                    <?php the_title() ?>
                </section>
                <section class="sigle-imovel-geral">
                    <div class="sigle-descricao">
                        <?php the_content() ?>
                    </div>
                </section>
                <span class="single-imovel-data">
                    <?php the_date() ?>
                </span>
            </div>
        <?php endwhile ?>
    <?php endif ?>

<?php get_footer() ?>
