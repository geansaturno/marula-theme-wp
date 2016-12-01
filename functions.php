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

function menus(){
    register_nav_menu('header-menu', 'main-menu');
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
