<?php
/*
 * Template Name: Single room
 * Template Post Type: pokoje
 * @package ths
 */
 get_header();  ?>

<section class="site_banner" style="background-image: url('<?php getField('banner_picture', 'op') ?>')">  
  <h1 class="site_banner--title">
    <span><?php echo the_title() ?></span>
    <div class="title-line-big white-line smallban-line-big"></div>
    <div class="title-line-small white-line smallban-line-small"></div>
</h1>
</section>


<?php get_footer(); ?>
