<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        get_header();

        while( have_posts()){
            the_post();
    ?>
    <div>
         <h2> <?php the_title(); ?> </h2>   
            <div >
                 <p> <?php   the_content();  ?> </p>

            </div>

             
    </div>
    <?php
        }
        get_footer();
     ?>
</body>
</html>

