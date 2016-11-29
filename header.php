<!DOCTYPE html>
<html>
<head>
    <?php $root_dir = get_template_directory_uri(); ?>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=$root_dir?>/assets/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?=$root_dir?>/style.css" type="text/css" />
    <link rel="stylesheet" href="<?=$root_dir?>/assets/css/yuri.css" type="text/css" />
    <?php wp_head() ?>
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
