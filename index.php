<?php $css_especifico = 'index'; ?>
<?php require_once('header.php') ?>

<main class="home-main">
    <div class="container">
        <h1>Bem vindo ao Maluras</h1>

        <?php
            $args = array(
                "post_type" => 'imovel',
            );
        ?>

        <?php $loop = new WP_query($args) ?>

        <?php if($loop->have_posts()) :?>
            <ul class="imoveis-listagem">
                <?php while($loop->have_posts()) :?>
                    <li class="imoveis-listagem-item">
                        <a href="<?=the_permalink()?>">
                            <?php $loop->the_post() ?>

                            <h2><?php the_title() ?></h2>
                            <?php the_post_thumbnail()?>
                            <p><?php the_content() ?></p>
                        </a>
                    </li>
                <?php endwhile ?>
            </ul>
        <?php endif ?>
    </div>
</main>

<?php get_footer() ?>
