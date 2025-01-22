<?php
    get_header();
    echo"<h1>Home.php</h1>";

    while(have_posts())
    {
        the_post();
        the_title();
        the_content();
    }
  echo "<button onclick='location.href = \"single.php\";'>single.php</button><br>";
  echo "<a href = \"single.php\">single.php</a><br>";


    get_footer();