<?php
    get_header();
?>  

<div class="container">

    <?php 
        $movie_title = get_post_meta( get_the_ID(), 'movie_title', true);
        echo '<h1>Movie Title: ' . $movie_title . '</h1>';
        the_content(); 
    ?>

</div>

<?php

    get_footer();
