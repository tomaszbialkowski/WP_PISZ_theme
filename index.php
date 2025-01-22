<?php get_header( );?>

<h2 class="section-header"><?php echo pll__('Publikacje', 'pisz')?></h1>
<main class='post-cards__wrapper'>
    <?php
        while (have_posts(  )) {
            the_post(  );
            get_template_part('template-parts/post_card');
        };?>
</main>

<?php
get_template_part('/template-parts/pagination');
    get_footer();
?>
index.php
