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
            <div>
                 <p> <?php   the_content();  ?> </p>
                 <hr style="border: 1px solid #333; margin: 20px 0; width: 100%;">

            </div>

            <?php
                }
                get_footer();
            ?> 
    </div>
</body>
</html>

