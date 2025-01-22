<?php
get_header();

echo"<h1>Singular.php</h1>";

while(have_posts()){
    the_post();
    the_title();

    the_content();

}

get_footer();