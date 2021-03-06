<!DOCTYPE html>
<html>
<head>
    <?php $root_dir = get_template_directory_uri(); ?>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=$root_dir?>/assets/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?=$root_dir?>/style.css" type="text/css" />
    <link rel="stylesheet" href="<?=$root_dir?>/assets/css/comum.css" type="text/css" />
    <link rel="stylesheet" href="<?=$root_dir?>/assets/css/header.css" type="text/css" />
    <link rel="stylesheet" href="<?=$root_dir?>/assets/css/<?=$css_especifico?>.css" type="text/css" />

    <title><?= geraTitle()?></title>
</head>
<body>

    <header>
        <div class="container">
            <?php
                $args = array(
                    'theme_location' => 'header-menu'
                );

                wp_nav_menu($args);
            ?>
        </div>
    </header>
