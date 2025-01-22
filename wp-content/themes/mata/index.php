<?php
get_header();

echo"<h1>Index.php</h1>";

while(have_posts()){
    the_post();
    the_title();

    the_content();

}
echo '<a href="' . home_url() . '">Go to Homepage</a>';


get_footer();