<?php 
get_header( ); ?>
<h2 class="section-header"><?php single_cat_title('', true)?></h2>
<main class='post-cards__wrapper'>
<?php
while (have_posts(  )) {
    the_post(  ); 
    get_template_part('template-parts/post_card');
};
echo '</main>';
get_template_part('/template-parts/pagination');
?>


<?php
get_footer( )
?>
archive.php