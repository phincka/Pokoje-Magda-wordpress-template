<?php
/*
 * Template Name: Single room
 * Template Post Type: pokoje
 * @package ths
 */
 get_header();  
 
 $rooms = get_pages(array(
  'meta_key' => '_wp_page_template',
  'meta_value' => 'template_rooms.php'
  ));
  foreach($rooms as $page){
    $page->ID;
  };

  $contact = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template_contact.php'
  ));
  foreach($contact as $page){
    $page->ID;
  };
 ?>

<section class="site_banner" style="background-image: url('<?php getField('banner_picture', 'op') ?>')">  
  <h1 class="site_banner--title">
    <span>Pokoje</span>
    <div class="title-line-big white-line smallban-line-big"></div>
    <div class="title-line-small white-line smallban-line-small"></div>
</h1>
</section>

<section class="single_room">
  <header class="single_room__header">
    <h2 class="single_room__header--title"><?php echo the_title() ?></h2>
    <div class="single_room__price-label">
        <h4 class="single_room__price-label--price"><span><?php getField('price') ?>zł</span> <br> noc</h4>
        <p class="single_room__price-label--period"></p>
      </div>  
  </header>

  <?php 
    $images = get_field('gallery');
    if( $images ): 
  ?>
    <div class="single_room__gallery gallery" >
      
      <a data-fslightbox class="single_room__gallery__single-main" href="<?php echo $images[0]['url']; ?>" >
        <img class="single_room__gallery__single--image" src="<?php echo $images[0]['sizes']['fullhd']; ?>" alt="<?php echo $images[0]['alt']; ?>" />
      </a>
        <div class="single_room__gallery__preview">
          <?php
            for ($i=1; $i < sizeof($images); $i++) { 
          ?>
            <a data-fslightbox class="single_room__gallery__single" href="<?php echo $images[$i]['url']; ?>" >
              <img class="single_room__gallery__single--image" src="<?php echo $images[$i]['sizes']['thumbnail']; ?>" alt="<?php echo $images[$i]['alt']; ?>" />
            </a>
          <?php } ?>
        </div>
    </div>
  <?php endif; ?>

  <div class="single_room__amenities">
    <?php
      if( have_rows('amenities_main') ):
      while ( have_rows('amenities_main') ) : the_row(); 
    ?>	
    <div class="amenities_single">
      <h3 class="amenities_single__info--title"><?php getSub('title') ?></h3>
      <p class="amenities_single__info--text"><?php getSub('value') ?></p>
    </div>
    <?php endwhile; endif; ?>
  </div>

  <div class="single_room__description">
    <div class="wyswig"><?php getField('description') ?></div>
  </div>
  
  <div class="single_room__buttons">
    <a class="single_room__buttons--single" href="<?php echo get_permalink($rooms->ID); ?>">Zobacz inne pokoje</a>
    <a class="single_room__buttons--single" href="<?php echo get_permalink($contact->ID); ?>">Napisz do nas</a>
  </div>
</section>



<?php get_footer(); ?>
