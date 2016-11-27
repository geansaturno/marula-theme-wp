<?php get_header() ?>

<main class="home-main">
    <div class="container">
        <h1>Bem vindo ao Maluras</h1>

        <?php if(have_posts()) :?>
            <ul class="imoveis-listagem">
                <?php while(have_posts()) :?>
                    <li class="imoveis-listagem-item">
                        <?php the_post() ?>

                        <h2><?php the_title() ?></h2>
                        <?php the_post_thumbnail()?>
                        <p><?php the_content() ?></p>
                    </li>
                <?php endwhile ?>
            </ul>
        <?php endif ?>
    </div>
</main>

<?php get_footer() ?>
