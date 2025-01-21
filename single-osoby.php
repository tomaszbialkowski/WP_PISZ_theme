<?php 
get_header( );?>

<h2 class="post_title"><?php the_title( ); ?></h2>
<div class="post_content"><?php the_content(); ?></div>

<?php
echo '<h3>Powiązane publikacje: </h3>';

$publikacje = new WP_Query(array(
   'posts_per_page' => -1,
        'post_type' => 'post',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array (
          array(
            'key' => 'autor',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"',
          ),
        )
));

echo "<section class='post-cards__wrapper'>";
if ($publikacje->have_posts()) {
    while ($publikacje->have_posts()) {
        $publikacje->the_post(); 
        get_template_part('template-parts/post_card');
    }   
   } else {
    echo '<p>Brak wyników dla autora o ID ' . $autorID . '</p>';
}
echo "</section>";
wp_reset_postdata();

get_footer( );
?>



single-osoby.php