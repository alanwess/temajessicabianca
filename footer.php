<?php wp_footer(); ?>

      <section id="notifique-me">
        <div id="fh5co-testimonial" style="background-image: url(<?= get_template_directory_uri(); ?>/images/cover_bg_1.jpg); background-attachment: fixed; background-size: 100% auto; background-position: center top;">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
              <h3 style="color: #ffffff;">Receber atualizações</h3>
              <p style="color: #ffffff;">Se inscreva agora mesmo em nossa lista e receba novidades sobre carreira, performance empresarial e muito mais</p>
              <br>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <form id="form_lead" class="form-inline" action="#">
                <div class="col-md-4">
                  <div class="form-group" style="width: 100%">
                    <label for="email_lead" class="sr-only">Email</label>
                    <input type="email" class="form-control" id="email_lead" placeholder="Seu email" style="width: 100%" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" style="width: 100%">
                    <label for="name_lead" class="sr-only">Nome</label>
                    <input type="text" class="form-control" id="name_lead" placeholder="Seu nome" style="width: 100%" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <button id="button_lead" type="submit" class="btn btn-default btn-block">Me inscrever</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div id="footer">
        <div class="container">
          <div class="row row-bottom-padded-md">
            <div class="col-md-4 col-sm-4 col-xs-12 fh5co-footer-link">
              <h3>Seções populares</h3>
              <ul>
                <?php $count_posted = wp_count_posts('post')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/postagens' ); ?>">Blog</a></li><?php endif; ?>
                <?php $count_posted = wp_count_posts('live')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/lives' ); ?>">Vídeos</a></li><?php endif; ?>
                <?php $count_posted = wp_count_posts('parceiro')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/parceiros' ); ?>">Parceiros</a></li><?php endif; ?>
                <li><a href="<?= home_url( '/contato' ); ?>">Contato</a></li>
                <li><a href="<?= home_url( '/privacidade' ); ?>">Privacidade</a></li>
              </ul>
            </div>
            <?php 
                $count_posted = wp_count_posts('live')->publish;
                if ($count_posted > 0): 
            ?>
            <div class="col-md-8 col-sm-8 col-xs-12 fh5co-footer-link">
              <h3>Vídeos recentes</h3>
              <ul>
                <?php 

                    $args = array(
                      'post_type'        => 'live',
                      'orderby'          => 'date',
                      'order'            => 'DESC',
                      'posts_per_page'   => 5
                    );

                    $loop = new WP_Query( $args );
                    if( $loop->have_posts()): 
                      while( $loop->have_posts() ):
                        $loop->the_post();
                ?>

                <li><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></li>

                <?php
                      endwhile;
                    endif;
                ?>
              </ul>
            </div>
            <?php endif; ?>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
              <p class="fh5co-social-icons">
                <a href="https://www.linkedin.com/in/jessicabiancarh/"><i class="icon-linkedin2"></i></a>
                <a href="mailto:inbox@jessicabianca.com.br"><i class="icon-email"></i></a>
              </p>
              <p>Copyright &copy; <?= date('Y'); ?> <a href="<?= bloginfo('url'); ?>"><?= bloginfo('name'); ?></a>. Todos os direitos reservados. <br>Feito por <a href="https://criejundiai.com.br" target="_blank">CrieJundiaí</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>
  </div>

  <div class="gototop js-top" style="left: 50%; margin-left: -20px;">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>

  <?php
    if(!in_array('wp-chatbot/wp-chatbot.php', apply_filters('active_plugins', get_option('active_plugins')))):
  ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

  <?php
    endif;
  ?>

  <!-- jQuery -->
  <script src="<?= get_template_directory_uri(); ?>/js/jquery.min.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/jquery.waypoints.min.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/sticky.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/jquery.countTo.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/jquery.stellar.min.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/hoverIntent.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/superfish.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/js/magnific-popup-options.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL4OTEHyaePvPf99FenLPoTWD8lGyAgFw&sensor=false"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  
  <!-- Main JS -->
  <script src="<?= get_template_directory_uri(); ?>/js/main.js"></script>

  <script>
    $('.js-gotop').on('click', function(event){
        
      event.preventDefault();

      $('html, body').animate({
        scrollTop: $('html').offset().top
      }, 500, 'easeInOutExpo');
      
      return false;
    });

    $(document).scroll(function(){

      if ($(document).scrollTop() > 200) {
        $('.js-top').addClass('active');
      } else {
        $('.js-top').removeClass('active');
      }

    });

    $('.js-counter').countTo({
       formatter: function (value, options) {
        return value.toFixed(options.decimals);
      },
    });

    let caminhomailchimp = "<?php echo get_template_directory_uri()."/mailchimpsignup.php"; ?>";

    let image_map = "<?php echo get_template_directory_uri().'/images/loc.png'; ?>";

  </script>

  </body>
</html>