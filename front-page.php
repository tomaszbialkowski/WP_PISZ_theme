<?php 
get_header( );

$featuredPosts = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'meta_query' => array(
        array(
            'key' => 'Wyroznione',
            'value' => 'TAK',
            'compare' => 'LIKE',
        ),
    ),
));

echo '<h2 class="section-header">'. pll__( 'Wyróżnione' ) .'</h2><section class="post-cards__wrapper">';
while ($featuredPosts->have_posts()) {
    $featuredPosts->the_post();
    get_template_part('template-parts/post_card');
    };
    echo '</section>';
wp_reset_postdata();
?>

<h2 class="section-header"> <?php echo pll__( 'Najnowsze publikacje' ) ?></h2>
<main class="post-cards__wrapper">
<?php 
    $latestPosts = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 6,
    ));
    
    while ($latestPosts->have_posts()) {
        $latestPosts->the_post();
        get_template_part('template-parts/post_card');

    };
    wp_reset_postdata();
    echo '</main>';
?>


<h2 class="section-header"> <?php echo pll__( 'Wydarzenia' ) ?></h2>
<section class="post-cards__wrapper">
<?php $events = new WP_Query(array(
    'post_type' => 'wydarzenia',
    'post_per_page' => 3,
));
while ($events->have_posts()) {
    $events->the_post();
    get_template_part('template-parts/post_card');
    wp_reset_postdata(  );
}
echo '</section>';
echo 'front-page.php';
get_footer( );
?>