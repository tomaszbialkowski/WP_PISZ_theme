<?php 
get_header( );?>


<h2 class="section-header">Nadchodzące wydarzenia</h2>
<?php
    $wydarzenia = new WP_Query(array(
        'post_type' => 'wydarzenia'
    ));

    echo '<main class="post-cards__wrapper">';
    while ($wydarzenia->have_posts()) {
        $wydarzenia->the_post(  );
        get_template_part('template-parts/post_card');
    };

    echo '<h2></main>';
    echo '<section><h2>Minione wydarzenia</h2></section>';

    get_template_part('/template-parts/pagination');
    get_footer();
?>

archive-wydarzenia.php