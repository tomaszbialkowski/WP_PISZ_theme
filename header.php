<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset='<?php bloginfo('charset'); ?>'>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
    <header>
        <div class='header_container'>
            <div class='header_logo_wrapper'>
            <a href="<?= site_url()?>"><img class='header_logo' src="<?php echo get_template_directory_uri() . "/images/PISZ_logo.png"?>" alt=""></a>
            </div>
            <div class='header_menu_wrapper'>
                <nav class='menu'>
                    <?php wp_nav_menu(array(
                        'theme_loaction' => 'headerMenuLocation'
                    ) )?>
                </nav>
            </div>
        </div>
    </header>
    <div class="content-container">