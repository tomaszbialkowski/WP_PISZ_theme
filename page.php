<?php 
get_header( );

while (have_posts(  )) {
    the_post(  );
the_title('<h2 class="section-header">', '</h2>' );
?> <p><?= get_the_content( )?></p>

<?php
}
get_footer( );
?>

page.php