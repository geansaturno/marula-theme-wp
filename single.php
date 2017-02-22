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

                <?php $imovelMetaInfo = $metaInfos = get_post_meta((int)$post->ID) ?>

                <dl class="single-imovel-informacoes">
                    <dt>Preço:</dt>
                    <dd><?=$imovelMetaInfo['preco_id'][0]?></dd>
                    <dt>Vagas:</dt>
                    <dd><?=$imovelMetaInfo['vagas_id'][0]?></dd>
                    <dt>Banheiros:</dt>
                    <dd><?=$imovelMetaInfo['banheiros_id'][0]?></dd>
                    <dt>Quartos:</dt>
                    <dd><?=$imovelMetaInfo['quartos_id'][0]?></dd>
                </dl>
            </div>
        <?php endwhile ?>
    <?php endif ?>

<?php get_footer() ?>
