<?php get_header(); ?>

		<div id="fh5co-wrapper">
		<div id="fh5co-page"> 

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="https://jessicabianca.com.br/"><img src="https://jessicabianca.com.br/wp-content/themes/rhumanize/images/logo.jpg" alt="logo" width="40px" style="border-top-left-radius: 25px;border-bottom-right-radius: 1px;border-bottom-left-radius: 25px;border-top-right-radius: 25px;transform: rotate(-10deg);margin-right: 3px;"></a> Jéssica Bianca</h1>
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li><a href="<?= home_url( '/' ); ?>">Home</a></li>
							<li><a href="<?= home_url( '/pessoa' ); ?>">Para você</a></li>
							<li><a href="<?= home_url( '/empresa' ); ?>">Para empresa</a></li>
							<?php $count_posted = wp_count_posts('live')->publish; if ($count_posted > 0): ?><li class="active"><a href="<?= home_url( '/lives' ); ?>">Vídeos</a></li><?php endif; ?>
							<?php $count_posted = wp_count_posts('post')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/postagens' ); ?>">Blog</a></li><?php endif; ?>
							<?php $count_posted = wp_count_posts('parceiro')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/parceiros' ); ?>">Parceiros</a></li><?php endif; ?>
							<li><a href="<?= home_url( '/contato' ); ?>">Contato</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<section id="live">
			<div id="fh5co-feature-product">
				<div class="container">
                   	<div class="row row-bottom-padded-md">
                   		<div class="row row-bottom-padded-md col-md-12 animate-box" style="margin-left: 5px; margin-right: 5px">
	                        <form class="navbar-form" method="get" role="search" action="busca-de-lives">
	                        	<div class="input-group input-group-lg add-on col-lg-12">
									<input type="text" class="form-control" name="busca" placeholder="Buscar vídeo..." width="100%">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
									</div>
								</div>
	                        </form>
                    	</div>
						<div class="col-md-7 text-center animate-box">
							<?php 
						      if( have_posts() ):
						        while( have_posts() ):
						          the_post();
						          setPostViews(get_the_ID());
						          $lives_meta_data = get_post_meta( $post->ID );
						          $id_live = $post->ID;
						    ?>
							<div class="col-md-12" style="padding-left: 0; padding-right: 0;">
								<?php if($lives_meta_data['tipo_live_id'][0] == "Facebook"): ?>
								<div id="livediv" style="display: none;">
									<div class="fb-video" data-href="<?= $lives_meta_data['livelink_id'][0]; ?>" data-show-text="false"><blockquote cite="<?= $lives_meta_data['livelink_id'][0]; ?>" class="fb-xfbml-parse-ignore"><a href="<?= $lives_meta_data['livelink_id'][0]; ?>"></blockquote></div>
								</div>
								<?php else: ?>
								<style type="text/css">
									.video-container {
										position: relative;
										padding-bottom: 56.25%;
										padding-top: 30px; height: 0; overflow: hidden;
										display: none; 
									}

									.video-container iframe,
									.video-container object,
									.video-container embed {
										position: absolute;
										top: 0;
										left: 0;
										width: 100%;
										height: 100%;
									}
								</style>
								<div id="livediv" class="video-container">
									<iframe width="650" height="370" src="https://www.youtube.com/embed/<?= $lives_meta_data['livelink_id'][0]; ?>" frameborder="0" allowfullscreen></iframe>
								</div>
								<?php endif; ?>
								<div id="boxloading" class="gtco-video gtco-video-sm gtco-bg" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; height: 400px; border-radius: 0px; ">
									<div style="background-color: rgba(0,0,0,0.7); position: absolute; top: 0; left: 0; width: 100%; height: 100%;/*  -webkit-border-radius: 7px; -moz-border-radius: 7px; -ms-border-radius: 7px;  border-radius: 7px; */">
										<div id="captacao_video" class="captacao_video animate-box" style="height: 90%!important; top: 5%!important; left: 5%!important; margin-top: 0!important; margin-left: 0!important;">
											<br>
											<h3 id="captacaocounteraviso" style="color: #ffffff;">Nossa <i class="fas fa-video" style="color: red"></i> LIVE ainda não começou...</h3>
											<p id="captacaocountertxt">Ela começará em: </p>
											<div id="captacaocounter" class="countdown col-md-12 text-center"></div>
											<h3 id="liveonline" style="color: #ffffff; display: none;">Começando nossa <i class="fa fa-video-camera" style="color: green"></i> LIVE, estamos te redirecionando...</h3>
											<div id="captacaoaviseme" class="notificar_btn col-md-12">
												<p class="smallp">Se deseja receber um email quando nossa live começar clique abaixo...</p>
												<a href="#notifique-me" class="btn btn-primary"><i class="fa fa-bell"></i> Me avise!</a>
											</div>
										</div>
									</div>
								</div>
								<script>
									var countdown = document.querySelector('.countdown');
									var countDownDate = new Date(<?= $lives_meta_data['d_ano_id'][0]; ?>,<?= $lives_meta_data['d_mes_id'][0]; ?>,<?= $lives_meta_data['d_dia_id'][0]; ?>,<?= $lives_meta_data['horalive_id'][0]; ?>,<?= $lives_meta_data['minlive_id'][0]; ?>,0,0);

									var checknow = new Date().getTime();
									var ds = countDownDate - checknow;
									if (ds < 0){
										document.getElementById('captacao_video').style.display = 'none';
										document.getElementById('boxloading').style.display = 'none';
										document.getElementById('livediv').style.display = 'block';
									}else{
										var x = setInterval(function() {

											var now = new Date().getTime();

											var distance = countDownDate - now;
											var days = Math.floor(distance / (1000 * 60 * 60 * 24));
											var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
											var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
											var seconds = Math.floor((distance % (1000 * 60)) / 1000);

											if(hours < 10){
												hours = '0' + hours;
											}

											if(minutes < 10){
												minutes = '0' + minutes;
											}

											if(seconds < 10){
												seconds = '0' + seconds;
											}

											if (distance < 0) {
												clearInterval(x);
											    $("#captacaocounter").hide();
											    $("#captacaocountertxt").hide();
											    $("#captacaocounteraviso").hide();
											    $("#captacaoaviseme").hide();
											    $("#liveonline").show();
											    location.reload();	
											} else{
												countdown.innerHTML = `
												  <div class="col-md-3 col-xs-3" style="border-bottom-left-radius: 50px 30px; border-top-left-radius: 15px;">${days}<span>d</span></div> 
												  <div class="col-md-3 col-xs-3">${hours}<span>h</span></div>
												  <div class="col-md-3 col-xs-3">${minutes}<span>m</span></div>
												  <div class="col-md-3 col-xs-3" style="border-top-right-radius: 50px 30px; border-bottom-right-radius: 15px;">${seconds}<span>s</span></div>
												  `;
											}
										}, 1000);
									}
								</script>
							</div>
							<div class="col-md-12" style="margin-top: 30px;">
								<div class="col-md-2">
									<a href="<?= get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><img width="70px" height="70px" src="<?php if(in_array('wp-user-avatar/wp-user-avatar.php', apply_filters('active_plugins', get_option('active_plugins')))){ echo scrapeImage(get_wp_user_avatar($post->post_author)); } ?>" alt="img" title="<?= get_the_author(); ?>" style="border-radius: 100%" ></a>
								</div>
								<div class="col-md-9 text-left" style="padding-top: 10px;">
									<h2><?php if($lives_meta_data['estado_live_id'][0] == "Online") echo '<i class="fas fa-video" style="color: green"></i>'; ?> <?php the_title(); ?></h2>
								</div>
								<div class="col-md-12 text-left" style="padding-top: 10px;">
									<div style="background-color: rgba(0,0,0,0.02);border-left: 5px #FF4749 solid; padding-left: 3px;"><font size="2px"><strong>Publicado em <?= $lives_meta_data['d_dia_id'][0]; ?> de
									<?php
										switch ($lives_meta_data['d_mes_id'][0]) {
									        case "0	":    $mes = Janeiro;     break;
									        case "1":    $mes = Fevereiro;   break;
									        case "2":    $mes = Março;       break;
									        case "3":    $mes = Abril;       break;
									        case "4":    $mes = Maio;        break;
									        case "5":    $mes = Junho;       break;
									        case "6":    $mes = Julho;       break;
									        case "7":    $mes = Agosto;      break;
									        case "8":    $mes = Setembro;    break;
									        case "9":    $mes = Outubro;     break;
									        case "10":    $mes = Novembro;    break;
									        case "11":    $mes = Dezembro;    break; 
								 		}
								 		echo $mes;
								 	?> de <?= $lives_meta_data['d_ano_id'][0]; ?></strong><br> Por <?= '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.get_the_author().'</a>'; ?> em <?php  
						                    $categories = get_the_category();
						                    $separator = ' ';
						                    $output = '';
						                    if ( ! empty( $categories ) ) {
						                        foreach( $categories as $category ) {
						                            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'Veja todos os posts em %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						                        }
						                        echo trim( $output, $separator );
						                    }
						              ?></font></div>
								</div>
								<div class="col-md-12 text-left" style="text-align: justify; padding-top: 10px;">
									<p><?php the_content(); ?></p>
								</div>
								<div class="col-md-12 text-center" style="padding-top: 10px;">
									<div class="col-md-7"><h4><i class="fa fa-eye"></i> <?= getPostViews_inlive(get_the_ID()); ?></h4></div>
									<div class="col-md-5"><div class="fb-like" data-href="<?= the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div></div>
								</div>
								<div class="col-md-12">
									<ul class="social-icons" style="margin-top: 10px; margin-bottom: 20px;">
					             	 <li class="title">Compartilhar no</li>
					                  <?php

					                    $useragent=$_SERVER['HTTP_USER_AGENT'];

					                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))):

					                  ?>
					                  <li><a class="whatsapp" href="whatsapp://send?text=*<?php the_title(); ?>* -  <?= the_permalink(); ?>"><i class="fab fa-whatsapp"></i></a></li>
					                  <?php else: ?>
					                  <li><a class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?= the_permalink(); ?>&media=<?= get_the_post_thumbnail_url($post->ID,'full'); ?>"><i class="fab fa-pinterest"></i></a></li>
					                  <?php endif; ?>
					                  <li><a class="facebook" href="http://www.facebook.com/sharer.php?u=<?= the_permalink(); ?>"><i class="fab fa-facebook"></i></a></li>
					                  <li><a class="google-plus" href="https://plus.google.com/share?url=<?= the_permalink(); ?>"><i class="fab fa-google-plus"></i></a></li>
					                  <li><a class="twitter" href="http://twitter.com/share?url=<?= the_permalink(); ?>&text=<?php the_title(); ?> em <?= $terms2[0]->name ?>"><i class="fab fa-twitter"></i></a></li>
					                  <li><a class="linkedin" href="javascript:void(0)" onclick="window.open( 'http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>', 'sharer', 'toolbar=0, status=0, width=626, height=436');return false;" title="<?php the_title(); ?>"><i class="fab fa-linkedin"></i></a></li>
						            </ul>
								</div>
							</div>
							<div class="col-md-12">
								<div class="fb-comments" data-href="<?= the_permalink(); ?>" data-numposts="5" data-width="100%"></div>
							</div>
						    <?php
						        endwhile;
						      endif;
						    ?>
						</div>
						<div class="col-md-5 text-center animate-box">
							
						<?php

		                    $args = array(
		                      'post_type'        => 'live',
		                      'posts_per_page'   => 8
		                    );

		                    $loop = new WP_Query( $args );
		                    if( $loop->have_posts()): 
		                      $count = $loop->post_count;
		                      while( $loop->have_posts() ):
		                        $loop->the_post();
		                        if($post->ID != $id_live):
		                  ?>
							<div class="col-md-12">
								<a href="<?= the_permalink(); ?>">
									<div class="col-md-5" style="padding-left: 0; padding-right: 0;"> 
										<div class="gtco-videos gtco-videos-sm gtco-bg" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>);background-repeat: no-repeat; background-size: 100% auto; background-position: center top; height: 120px;   -webkit-filter: brightness(0.50);filter: brightness(0.50); border-radius: 0px;">
										</div>
									</div>
									<div class="col-md-7 text-left" style="padding-left: 10px; padding-right: 0; word-wrap: break-word;">
										<p><?= the_title(); ?></p>
										<p><i class="fa fa-eye"></i> <?= getPostViews_offlive(get_the_ID()); ?></p>
									</div>
								</a>
							</div>
						 <?php
		                          endif;
		                      endwhile;
		                    endif;
		                  ?>  

						</div>
					</div>					
				</div>
			</div>
		</section>

		<style type="text/css">
        .flex-container {
          padding: 0;
          margin: 0;
          list-style: none;
          -ms-box-orient: horizontal;
          display: -webkit-box;
          display: -moz-box;
          display: -ms-flexbox;
          display: -moz-flex;
          display: -webkit-flex;
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .nowrap { 
          -webkit-flex-wrap: nowrap;
          flex-wrap: nowrap;
        }

        .wrap { 
          -webkit-flex-wrap: wrap;
          flex-wrap: wrap;
        }  

        .wrap-reverse { 
          -webkit-flex-wrap: wrap-reverse;
          flex-wrap: wrap-reverse;
        }

        .tags{
          background-color: #FF4749;
          border-radius: 20px; 
          padding: 5px; 
          margin-bottom: 6px;
          margin-left: 1.5px;
          margin-right: 1.5px;
          text-transform: capitalize;
        }

        .banner-conteudo{
          border-top-left-radius: 10px; 
          border-top-right-radius: 10px; 
          border-bottom-left-radius: 10px; 
          border-bottom-right-radius: 10px;
        }

        .banner-cabecalho{
          background-color: #FF4749; 
          border-top-left-radius: 9px; 
          border-top-right-radius: 9px;
          padding-bottom: 30px;
        }

        .banner{
            position: absolute; 
            -webkit-transform: translate(-50%, -50%); 
            transform: translate(-50%, -50%) !important; 
            top: 50% !important; 
            left: 50% !important;
            margin-top: 0px;
        }

        @media (max-width: 767px){
          .banner{
            position: absolute; 
            -webkit-transform: translate(0, -50%) !important;
            transform: translate(0, -50%) !important; 
            top: 50% !important;  
            left: 0 !important;
            margin-top: 0px;
          }
        }
      </style>
      <div class="modal fade" id="banner-servicos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog banner">
          <div class="modal-content banner-conteudo">
            <div class="modal-header banner-cabecalho">
              <button type="button" class="close" style="color: #ffffff !important;" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><i class="fa fa-close"></i></span></button>
            </div>
            <div class="modal-body text-center">
              <div class="modal-body text-center">
                <form id="pfb-signup-submission" action="#">
                <h3>Deseja estar por dentro das nossas lives? Vamos te notificar!</h3>
                <input style="margin-bottom: 4px; border-radius: 3px;" id="pfb-signup-box-nome" type="text" class="form-control input-lg" placeholder="Seu nome" required>
                <input style="margin-bottom: 4px; border-radius: 3px;" id="pfb-signup-box-email" type="email" class="form-control input-lg" placeholder="Seu email" required>
                <input style="margin-bottom: 10px; border-radius: 3px;" id="pfb-signup-box-whatsapp" type="text" class="form-control input-lg" placeholder="Seu whatsapp" required>
                <button id="pfb-signup-button" type="submit" style="margin-bottom: 4px; display: block; margin: 0 auto;" class="btn btn-primary btn-lg">Me avise!</button>
                </form>
                    
                <script>
                  $(document).ready(function(){
                    $('#pfb-signup-box-whatsapp').mask('(00) 00000 - 0000');
                  });
               
                  $('#pfb-signup-submission').submit(function(event) {
                    event.preventDefault();

                    var pfbSignupFNAME = $('#pfb-signup-box-nome').val();
                    var pfbSignupLNAME = $('#pfb-signup-box-whatsapp').val();
                    var pfbSignupEMAIL = $('#pfb-signup-box-email').val();

                    var pfbSignupData = {
                      'firstname': pfbSignupFNAME,
                      'lastname': pfbSignupLNAME,
                      'email': pfbSignupEMAIL
                    };

                    $.ajax({
                      type: 'POST',
                      dataType: 'json',
                      url: '<?php echo get_template_directory_uri()."/mailchimpsignup.php"; ?>',
                      data: pfbSignupData,
                      beforeSend: function(){
                         $("#pfb-signup-button").html('Solicitando...');
                      },
                      success: function (results) {
                        $('#pfb-signup-box-nome').attr('disabled',true);
                        $('#pfb-signup-box-email').attr('disabled',true);
                        $('#pfb-signup-box-whatsapp').attr('disabled',true);
                        console.log(results);
                        $("#pfb-signup-button").html('<i class="fa fa-check"></i> Recebido');
                        $('#pfb-signup-button').attr('disabled',true);
                      },
                      error: function (results) {
                        window.alert('Nos desculpe, ocorreu um erro ao tentar te adicionar na lista de amigos :(');
                        console.log(results);
                      }
                    });
                  });
                </script>
                </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        $(window).ready(function(){
          setTimeout(function(){
                 $('#banner-servicos').modal('show');
             }, 5000);
          });
      </script>


<?php get_footer(); ?>