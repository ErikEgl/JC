<?php
get_header();

if ( have_posts() ) :

    /* Start the Loop */
    while ( have_posts() ) :
        the_post();
        the_title();
    endwhile;

else :

    echo 'Нет новостей';

endif;

get_footer();
