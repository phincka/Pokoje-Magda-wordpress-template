<?php
/*
 * Template Name: Home
 * @package ths
 */
 get_header();  ?>
<section  class="homepage_banner" style="background-image: url('<?php getField('banner_picture', 'op') ?>')">  
  <header class="homepage_banner__titles">
    <h1 class="homepage_banner__titles--title"><?php getField('banner_title') ?></h1>
    <h2 class="homepage_banner__titles--subtitle"><?php getField('banner_subtitle') ?></h2>
  </header>
</section>

<section class="homepage_rooms grid">
  <h2 class="homepage_rooms--title">
    <span class="room-title">Pokoje</span>
    <div class="title-line-big room-line-big"></div>
    <div class="title-line-small room-line-small"></div>
  </h2>
  <ul class="homepage_rooms__list">
    <?php
      if( have_rows('rooms_list') ):
      while ( have_rows('rooms_list') ) : the_row(); 
        if( have_rows('group') ):
        while ( have_rows('group') ) : the_row(); 
          $featured_post = get_sub_field('room_link'); 
    ?>
      <li class="homepage_rooms__room">
        <a class="homepage_rooms__room--thumbnail" href="<?php the_permalink($featured_post->ID); ?>"><img src="<?php echo get_sub_field('room_img') ?>" alt="zdjecie-pokoju"></a>
        <div class="homepage_rooms__room__info">
          <h3 class="homepage_rooms__room--title"><?php echo $featured_post->post_title ?></h3>
          <p class="homepage_rooms__room--description"><?php echo $featured_post->short_desctiption ?></p>
          <div class="homepage_rooms__room__pricing">
            <p class="homepage_rooms__room__pricing--price"><span><?php echo $featured_post->price . 'zł' ?></span> <br> noc</p>
            <a class="homepage_rooms__room__pricing--button" href="<?php the_permalink($featured_post->ID); ?>">Sprawdź dostępność</a>
          </div>
        </div>
      </li>
    <?php endwhile; endif; endwhile; endif; ?>
  </ul>
  <?php 
    if( have_rows('rooms_button') ):
    while ( have_rows('rooms_button') ) : the_row();?>
      <a class="homepage_rooms--button" href="<?php getSub('url') ?>"><?php getSub('title') ?></a>
  <?php endwhile; endif; ?>
</section>

<section class="homepage_gallery">
  <h2 class="homepage_gallery--title">
    <span class="gallery-title">Galeria zdjęć</span>
    <div class="title-line-big gallery-line-big"></div>
    <div class="title-line-small gallery-line-small"></div>
  </h2>
  <div class="homepage_gallery__bottom">
    <div class="homepage_gallery__left">
      <img class="homepage_gallery__left--picture" src="<?php aImage('left_picture') ?>" alt="<?php aAlt('left_picture') ?>">
      <?php 
        if( have_rows('gallery_button') ):
        while ( have_rows('gallery_button') ) : the_row();?>
          <a class="homepage_gallery__left--button" href="<?php getSub('url') ?>"><?php getSub('title') ?></a>
      <?php endwhile; endif; ?>
    </div>
    <img class="homepage_gallery--right-picture" src="<?php aImage('right_picture') ?>" alt="<?php aAlt('right_picture') ?>">
  </div>
</section>



 <?php get_footer(); ?>
