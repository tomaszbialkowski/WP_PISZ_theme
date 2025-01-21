</div>
<footer>
<img src="<?php echo get_template_directory_uri() . '/images/PISZ_logo_podpis.png'?>" alt="" >
<?php
        wp_footer();
        wp_nav_menu(array(
            'theme_loaction' => 'footerMenuLocation'
    ) )?>
</footer>
</body>
</html>