</main>

<footer class="footer" >
  <div class="footer__top" style="background-image: url('<?php getField('footer_banner_picture', 'op') ?>')">
    <h2 class="footer__top--title"><?php getField('footer_banner_title', 'op') ?></h2>
    <?php 
      if( have_rows('contact_button', 'option') ):
      while ( have_rows('contact_button', 'option') ) : the_row();?>
        <a class="footer__top--button" href="<?php getSub('url') ?>"><?php getSub('title') ?></a>
    <?php endwhile; endif; ?>
  </div>
  <div class="footer__main">
    <a class="footer__main--branding" href="<?php echo home_url(); ?>">Pokoje gościnne <br> <span>MAGDA</span></a>
    <div class="footer__main__contact_forms">
     <h4 class="footer__main__contact_forms--title"><?php getField('contact_title', 'op')?></h4>
      <ul class="footer__main__contact_forms__list">
        <?php 
            if( have_rows('contact_forms', 'option') ):
            while ( have_rows('contact_forms', 'option') ) : the_row(); 
        ?>	
          <li class="footer__main__contact_forms__list--element"><img src="<?php aImage('icon') ?>" alt=""<?php aAlt('icon') ?>"><span><?php getSub('text') ?></span></li>
        <?php endwhile; endif; ?>
      </ul>
    </div>
    <div class="footer__main__menu">
      <?php wp_nav_menu( array('theme_location' => 'footer')) ?>
    </div>
  </div>
  <div class="footer__author">
    <p class="footer__author--text">Copyright © Pokoje gościnne - Magda</p>
    <p class="footer__author--text">Realizacja <a href="https://www.facebook.com/jan.szweda.9">Jan Szweda</a> & <a href="https://hincka.pl/">Paweł Hincka</a></p>
  </div>

  <div id="cookies-message-container"><div id="cookies-message">Ta strona używa ciasteczek (cookies), dzięki którym nasz serwis może działać lepiej.<a id="accept-cookies-checkbox">Rozumiem</a></div></div>
</footer>

<?php wp_footer(); ?>
</body>
</html>	