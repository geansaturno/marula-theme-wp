<?php

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
add_action('init', 'taxonimies');
