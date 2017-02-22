<?php
    $queryTax = array_key_exists('taxonomy', $_GET);
    if($queryTax && empty($_GET['taxonomy'])) {
        wp_redirect(home_url());
        exit;
    }
    $css_especifico = 'index';
    require_once('header.php');
?>

<main class="home-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php $taxes = get_terms('localizacao')?>
                <form class="busca-localizacao-form" method="get" action="<?= bloginfo('url'); ?>">
                    <div class="taxonomy-select-wrapper">
                        <select name="taxonomy" class="form-control">
                            <option value="">Todas localizações</option>
                            <?php foreach($taxes as $taxonomia) : ?>
                                <option value="<?= $taxonomia->slug; ?>" <?=($_GET['taxonomy'] == $taxonomia->name) ? 'selected' : ''?>><?= $taxonomia->name; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Bem vindo ao Maluras</h1>

        <?php
            if($queryTax) {
                $taxQuery = array(
                    array(
                        'taxonomy' => 'localizacao',
                        'field' => 'slug',
                        'terms' => $_GET['taxonomy']
                    )
                );
            }
        ?>

        <?php
            $args = array(
                "post_type" => 'imovel',
                "tax_query" => $taxQuery,
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
