<?php
/*
 * Template Name: Contact
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

<section class="contact_page">
  <div class="contact_page__top">
    <div class="contact_page__contact_forms">
      <h2 class="contact_page__contact_forms--title">Skontaktuj się z nami</h2>
      <?php
        if( have_rows('contact_forms') ):
        while ( have_rows('contact_forms') ) : the_row(); 

      ?>	
        <div class="contact_page__contact_forms__single">
          <img class="contact_page__contact_forms__single--icon" src="<?php aImage('icon') ?>" alt="<?php aAlt('icon') ?>">
          <h3 class="contact_page__contact_forms__single--text"><?php getSub('text') ?></h3>
        </div>
      <?php endwhile; endif; ?>
    </div>

    <div class="contact_page__form">
      <h2 class="contact_page__form--title">Napisz do nas</h2>
      <?php echo do_shortcode( '[contact-form-7 id="124" title="Contact form 1"]' ) ?>
    </div>
  </div>
  

  <div class="contact_page__map">
   <iframe class="contact_page__map--map" src="<?php getField('map_address') ?>" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>

  <div class="contact_page__info">
    <div class="contact_page__info__left"><?php getField('informations') ?></div>
    <div class="contact_page__info__right">
      <ul class="contact_page__info__right__list">
        <?php
          if( have_rows('documents') ):
          while ( have_rows('documents') ) : the_row(); 

          $group = get_sub_field('group');
        ?>	
          <li class="contact_page__info__right__list--element">
            <a target="_blank" href="<?php echo $group['url'] ?>"><?php echo $group['label'] ?></a>
          </li>
        <?php endwhile; endif; ?>
      </ul>
    </div>
  </div>

</section>

 <?php get_footer(); ?>
