<?php get_header( ); 
    $lang = function_exists('pll_current_language') ? pll_current_language() : false;

    while (have_posts(  )) {
        the_post(  );?>
        <p>
            <?php 
                the_category(', ');
                if ($lang === 'pl') echo ' z ';
                if ($lang === 'en') echo ' of ';
                echo get_the_date("d F Y");
            ?>
        </p>
        <h2 class="post_title"><?php the_title( ); ?></h2>
        <div class="post_content"><?php the_content()?>
        </div>
        <div>
        <?php 
                if ($lang === 'pl') echo '<h2>Autorzy</h2>';
                if ($lang === 'en') echo '<h2>Authors</h2>';
            ?>
            <ul>
                <?php 
                $autorzy = get_field('autor');
                foreach ($autorzy as $autor) {?>
                    <li>
                        <a href="<?php echo get_the_permalink($autor)?>">
                            <?php echo get_the_title($autor)?>
                        </a>
                    </li>
                <?php };
        echo '</ul></div>';
    };
get_footer( ); 
?>

single.php
