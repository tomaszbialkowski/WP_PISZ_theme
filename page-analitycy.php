<?php
/*
Template Name: Szablon dla Analityków
*/
?>

<?php 
get_header( );?>


<h2 class="section-header"><?php echo pll__('Analitycy')?></h2>
<?php
$osoby = new WP_Query(array(
    'post_type' => 'osoby',
    'tax_query' => [
        [
            'taxonomy' => 'rola', // Taksonomia
            'field' => 'slug', // Wyszukiwanie według slugu
            'terms' => 'analityk', // Slug kategorii
        ],
    ],
    'posts_per_page' => -1, // Wszystkie osoby z kategorią Analityk
));
echo '<ul>';
while ($osoby->have_posts()) {;
    $osoby->the_post(  );?>
    <li><a href="<?php the_permalink()?>"><h2><?php the_title();?></h2></a></li>
<?php
};
echo '</ul>';

get_template_part('/template-parts/pagination');
get_footer();
?>

page-analitycy.php