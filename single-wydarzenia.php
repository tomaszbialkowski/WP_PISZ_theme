<?php get_header( ); 
    while (have_posts(  )) {
        the_post(  );?>
        <h2><?php the_title( ); ?></h2>
        <div>
            <p><?php the_content()?></p>
        </div>
    <?php };
get_footer( ); 
?>


single-wydarzenia.php