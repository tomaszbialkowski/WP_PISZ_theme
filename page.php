<?php 
get_header( );

while (have_posts(  )) {
    the_post(  );
the_title('<h2 class="section-header">', '</h2>' );
?> <p><?= get_the_content( )?></p>

page.php
<?php
}
get_footer( );
?>