<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- These link tags aren't needed in WP -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> -->
    <?php wp_head(); ?>
    <title>freeCodeCamp</title>
</head>
<body>
    <div id="slideout-menu">
        <ul>
            <li>
                <a href="<?php echo site_url(""); ?>">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url("/blog"); ?>">Blogs</a>
            </li>
            <li>
                <a href="<?php echo site_url("/projects"); ?>">Projects</a>
            </li>
            <li>
                <a href="<?php echo site_url("/about"); ?>">About</a>
            </li>
            <div class="searchbox-slide-menu">
                <?php get_search_form(); ?>
            </div>
        </ul>
    </div>

    <nav>
        <div id="logo-img">
            <a href="<?php echo site_url(""); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/jk.png" alt="GTCoding Logo">
            </a>
        </div>
        <div id="menu-icon">
            <!-- "i" tag is used with class for font awesome -->
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
                <a href="<?php echo site_url(""); ?>"
                    <?php if(is_front_page()) echo 'class="active"' ?>
                >Home</a>
            </li>
            <li>
                <a href="<?php echo site_url("/blog"); ?>"
                    <?php if(get_post_type() == 'post') echo 'class="active"' ?>
                >Blog</a>
            </li>
            <li>
                <a href="<?php echo site_url("/projects"); ?>"
                    <?php if(get_post_type() == 'project') echo 'class="active"' ?>
                >Projects</a>
            </li>
            <li>
                <a href="<?php echo site_url("about"); ?>"
                    <?php if(is_page('about')) echo 'class="active"' ?>
                >About</a>
            </li>
            <li>
                <div id="search-icon">
                    <i class="fas fa-search"></i>
                </div>
            </li>
        </ul>
    </nav>

    <div id="searchbox">
        <?php get_search_form(); ?>
    </div>

    <?php if(!is_front_page()) { ?>
        <main>
    <?php } ?>