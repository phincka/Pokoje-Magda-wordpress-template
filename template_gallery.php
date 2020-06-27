<?php
/*
 * Template Name: Gallery
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

<section class="gallery_page">
  <?php 
    $images = get_field('gallery');
    if( $images ): 
      for ($i=0; $i < sizeof($images); $i++) { 
       
    ?>
      <a data-fslightbox class="gallery_page__single" href="<?php echo $images[$i]['url']; ?>" >
        <img class="gallery_page__single--image" src="<?php echo $images[$i]['sizes']['medium_large']; ?>" alt="<?php echo $images[$i]['alt']; ?>" />
      </a>
    <?php } ?>
      </div>
    </div>
  <?php endif; ?>


</section>


 <?php get_footer(); ?>
