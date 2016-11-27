<?php

add_theme_support('post-thumbnails');

function postTypes(){

    $nome = 'Imóvel';
    $nomePlural = 'Imóveis';

    $labels = array(
        'name' => $nomePlural,
        'name_singular' => $nome,
        'add_new_item' => 'Adicionar novo ' . $nome,
    );

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

add_action('init', 'postTypes');
