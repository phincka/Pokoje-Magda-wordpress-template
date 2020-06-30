<?php
/*
 * Template Name: Pokoje
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
<section class="rooms_list grid">

<?php 
  $args = array(
    'post_type' => 'pokoje',
    'post_status' => 'publish',
  ); 
  $query = new WP_Query($args);
  
  global $post;

	if($query->have_posts()) :
	while ($query->have_posts()) : $query->the_post();
    
?>
  <article class="rooms_element">
    <a class="rooms_element--thumbnail" href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail(); ?>
      <div class="rooms_element__price-label">
        <h4 class="rooms_element__price-label--price"><a href="<?php the_permalink(); ?>"><span><?php getField('price') ?>zł</span> <br> noc</a></h4>
        <p class="rooms_element__price-label--period"></p>
      </div>
    </a>
    <div class="rooms_element__info">
      <h2 class="rooms_element__description--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p class="rooms_element__description--text"><a href="<?php the_permalink(); ?>"><?php getField('short_desctiption') ?></a></p>

      <?php 
        if( have_rows('amenities') ):
        while ( have_rows('amenities') ) : the_row();?>
          <ul class="rooms_element__amenities">
            <li class="rooms_element__amenities__element">
              <h5 class="rooms_element__amenities__element--title">Osoby</h5>
              <p class="rooms_element__amenities__element--text"><?php getSub('adults') ?></p>
            </li>
            <li class="rooms_element__amenities__element">
              <h5 class="rooms_element__amenities__element--title">Łóżka</h5>
              <p class="rooms_element__amenities__element--text"><?php getSub('beds') ?></p>
            </li>
            <li class="rooms_element__amenities__element">
              <h5 class="rooms_element__amenities__element--title">WiFi</h5>
              <p class="rooms_element__amenities__element--text"><?php getSub('wifi') ?></p>
            </li>
          </ul>
        <?php endwhile; endif; ?>
    <div class="button-container">
      <a class="rooms_element--button" href="<?php the_permalink(); ?>">Zobacz pokój</a>
    </div>
  </article>

<?php 
  endwhile; endif; wp_reset_query();?>
</section>
<?php
  get_footer(); 
?>
