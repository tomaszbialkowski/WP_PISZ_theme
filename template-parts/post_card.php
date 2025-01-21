<div class="post-card">
    <div class="post-card__header">
        <span class="post-card__category">
            <?php
                if (get_post_type() == "wydarzenia") {
                    echo '<a href="' . get_post_type_archive_link("wydarzenia") . '">' . get_post_type() . '</a>';
                    echo '</span>';
                } else {
                    the_category(', ');
                    echo ' </span><span class="post-card__date">z dnia ' . get_the_date("j.m.Y") . '</span>';
                }
            ?>   
        <h3 class="post-card__title"><a href="<?php the_permalink( )?>"><?php the_title( )?></a></h3>
        <?php 
        if (get_post_type() == "wydarzenia") {
            echo "<p class='post_card__date'><span class='dashicons dashicons-calendar'></span>" . get_field('start_wydarzenia');
            echo !empty(get_field('koniec_wydarzenia')) ? " - " .get_field('koniec_wydarzenia') : "";
            echo "</p>";
        };
        
        ?>
        <p class="post-card__author">
            <?php
            $autorzy = get_field('autor');
            
            if( !empty($autorzy) && is_array($autorzy)) {

                $nazwiskaAutorów = array_map(function($autor) {
                    $link = get_permalink($autor->ID);
                    return '<a href="' . esc_url($link) . '">' . esc_html($autor->post_title) . '</a>';
                },$autorzy);

                echo implode(', ', $nazwiskaAutorów);
            };?>
            </p>
    </div>
    <div class="post-card__image--wrapper">
        <img class='post-card__image--picture' src="<?php
        if (get_field('zdjecie')) {
            echo esc_url(get_field('zdjecie'));
        } else {
            echo esc_url(DEFAULT_IMAGE);
        }?>" alt=''>
    </div>
</div>
