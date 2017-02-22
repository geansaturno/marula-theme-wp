<?php

function enviar_e_checar_email($nome, $email, $mensagem) {
        return wp_mail( 'joaodasilvaalura@gmail.com', 'Email Malura', 'Nome: ' . $nome . "\n" . $mensagem  );
}

add_theme_support('post-thumbnails');

function registerLabels($name, $namePlural){

    $labels = array(
        'name' => $namePlural,
        'singular_name' => $name,
        'view_item' => 'Ver ' . $name,
        'edit_item' => 'Editar ' . $name,
        'new_item' => 'Novo ' . $name,
        'add_new_item' => 'Adicionar novo ' . $name
    );

    return $labels;
}

function postTypes(){

    $nome = 'Imóvel';
    $nomePlural = 'Imóveis';

    $labels = registerLabels($nome, $nomePlural);

    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-admin-home',
        'menu_position' => 5,
        'supports' => $supports
    );

    register_post_type('imovel', $args);
}

function taxonimies(){

    $name = 'Localização';
    $namePlural = "Localizações";

    $labels = registerLabels($name, $namePlural);

    $args = array(
        'hierarchical' => true,
        'public' => true,
        'labels' => $labels
    );

    register_taxonomy('localizacao', 'imovel', $args);

}

function menus(){
    register_nav_menu('header-menu', 'main-menu');
}

function preenche_informacoes_imovel($post){
    $metaInfos = get_post_meta((int)$post->ID);

    ?>

    <style>
        .maluras-metabox {
            display: flex;
            justify-content: space-between;
        }

        .maluras-metabox-item {
            flex-basis: 30%;

        }

        .maluras-metabox-item label {
            font-weight: 700;
            display: block;
            margin: .5rem 0;

        }

        .input-addon-wrapper {
            height: 30px;
            display: flex;
            align-items: center;
        }

        .input-addon {
            display: block;
            border: 1px solid #CCC;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
            height: 100%;
            width: 30px;
            text-align: center;
            line-height: 30px;
            box-sizing: border-box;
            background-color: #888;
            color: #FFF;
        }

        .maluras-metabox-input {
            height: 100%;
            border: 1px solid #CCC;
            border-left: none;
            margin: 0;
        }

    </style>
    <div class="maluras-metabox">
        <div class="maluras-metabox-item">
            <label for="maluras-preco-input">Preço:</label>
            <div class="input-addon-wrapper">
                <span class="input-addon">R$</span>
                <input id="maluras-preco-input" class="maluras-metabox-input" type="text" name="preco_id"
                value="<?= number_format($metaInfos['preco_id'][0], 2, ',', '.'); ?>">
            </div>
        </div>

        <div class="maluras-metabox-item">
            <label for="maluras-vagas-input">Vagas:</label>
            <input id="maluras-vagas-input" class="maluras-metabox-input" type="number" name="vagas_id"
            value="<?= $metaInfos['vagas_id'][0]; ?>">
        </div>

        <div class="maluras-metabox-item">
            <label for="maluras-banheiros-input">Banheiros:</label>
            <input id="maluras-banheiros-input" class="maluras-metabox-input" type="number" name="banheiros_id"
            value="<?= $metaInfos['banheiros_id'][0]; ?>">
        </div>

        <div class="maluras-metabox-item">
            <label for="maluras-quartos-input">Quartos:</label>
            <input id="maluras-quartos-input" class="maluras-metabox-input" type="number" name="quartos_id"
            value="<?= $metaInfos['quartos_id'][0]; ?>">
        </div>

    </div>

    <?php
}

function metaboxes(){
    add_meta_box(
        "infomacoes-imovel",
        "Infomraçãoes Imóveis",
        "preenche_informacoes_imovel",
        'imovel',
        'normal',
        'high'
    );
}

function update_meta_infos($post_id){
    $post = $_POST;


    if(isset($post['preco_id'])){
        update_post_meta($post_id, 'preco_id', sanitize_text_field($post['preco_id']));
    }

    if(isset($post['banheiros_id'])){
        update_post_meta($post_id, 'banheiros_id', sanitize_text_field($post['banheiros_id']));
    }

    if(isset($post['vagas_id'])){
        update_post_meta($post_id, 'vagas_id', sanitize_text_field($post['vagas_id']));
    }

    if(isset($post['quartos_id'])){
        update_post_meta($post_id, 'quartos_id', sanitize_text_field($post['quartos_id']));
    }
}

function geraTitle(){

    bloginfo('name');

    if(!is_home()){
        echo ' | ';
        the_title();
    }

}

add_action('init', 'postTypes');
add_action('init', 'menus');
add_action('init', 'taxonimies');
add_action('add_meta_boxes', 'metaboxes');
add_action('save_post', 'update_meta_infos');
