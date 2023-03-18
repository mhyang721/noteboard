<!-- Head section that was separated from the public/index.php file to keep things organized -->
<?php

    // If $title_tag is not defined, it will be assigned an empty string
    $title_tag = $title_tag ?? ''; 

?><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Store the titles in a variable so it will automatically change depending on the page we are on -->
    <title>MDIA 3294 - <?php echo h($title_tag); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <!-- tailwindcss -->
    <?php require(get_path('public/partials/tailwind.php')); ?>
</head>