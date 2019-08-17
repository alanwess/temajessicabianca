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
							<li class="active"><a href="<?= home_url( '/' ); ?>">Home</a></li>
							<li><a href="<?= home_url( '/pessoa' ); ?>">Para você</a></li>
							<li><a href="<?= home_url( '/empresa' ); ?>">Para empresa</a></li>
							<?php $count_posted = wp_count_posts('live')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/lives' ); ?>">Vídeos</a></li><?php endif; ?>
							<?php $count_posted = wp_count_posts('post')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/postagens' ); ?>">Blog</a></li><?php endif; ?>
							<?php $count_posted = wp_count_posts('parceiro')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/parceiros' ); ?>">Parceiros</a></li><?php endif; ?>
							<li><a href="<?= home_url( '/contato' ); ?>">Contato</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<div class="fh5co-hero">
			<div class="fh5co-cover text-center" style="background-image: url(<?= get_template_directory_uri(); ?>/images/cover_bg_1.jpg); background-attachment: fixed; background-size: 100% auto;background-position: center top;">
				<div class="fh5co-overlay">
					<div class="desc">
						<div class="container">
							<div class="col-md-10 col-md-offset-1">
								<div class="animate-box">
									<h2>O impulso que sua carreira merece hoje...</h2>
									<p>Mude sua vida agora mesmo!</p>
									<p><a class="btn btn-primary btn-lg" href="#sobre">Aconteça!</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<section id="sobre">
			<div id="fh5co-feature-product">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Quem somos nós</h3>
							<p>Conheça um pouco mais de nosso trabalho e qual é a nossa principal proposta.</p>
						</div>
					</div>

					<div class="row row-bottom-padded-md">
						<div class="col-md-12 text-center">
							<p class="animate-box">Acreditamos no poder <strong>transformador</strong> da humanização e <strong>reconhecimento</strong> do potencial humano.</p> 
							<p class="animate-box">Nosso <strong>propósito</strong> é desenvolver <strong>talentos</strong>, algo feito com <strong>amor</strong> e que traz agilidade nos <strong>resultados</strong>.</p>
							<p class="animate-box">O <strong>segredo</strong> de nossa consultoria é o alinhamento entre propósitos de <strong>vida</strong> com propósitos de <strong>negócios</strong>.</p>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 text-center animate-box">
							<a href="<?= home_url( '/contato' ); ?>" class="btn btn-primary btn-lg">Solicitar contato</a>
						</div>
					</div>
					
				</div>
			</div>
		</section>

		<style>
			* {box-sizing:border-box}

			/* Slideshow container */
			.slideshow-container {
			  max-width: 1000px;
			  position: relative;
			  margin: auto;
			}

			/* Hide the images by default */
			.slideshow-container .mySlides {
			  display: none;
			}

			/* Next & previous buttons */
			.slideshow-container .prev, .slideshow-container .next {
			  cursor: pointer;
			  position: absolute;
			  top: 50%;
			  width: auto;
			  margin-top: -22px;
			  padding: 16px;
			  color: rgba(0, 0, 0, 0.6);
			  font-weight: bold;
			  font-size: 18px;
			  transition: 0.6s ease;
			  border-radius: 0 3px 3px 0;
			  user-select: none;
			}

			/* Position the "next button" to the right */

			.slideshow-container .prev {
			  left: 0;
			  border-radius: 3px 0 0 3px;
			}

			.slideshow-container .next {
			  right: 0;
			  border-radius: 3px 0 0 3px;
			}

			/* On hover, add a black background color with a little bit see-through */
			.slideshow-container .prev:hover, .slideshow-container .next:hover {
			  background-color: rgba(255,255,255,0.8);
			}

			/* Number text (1/3 etc) */
			.slideshow-container .numbertext {
			  color: rgba(0, 0, 0, 0.6);
			  font-size: 12px;
			  right: 0px;
			  position: absolute;
			  top: 0;
			}

			/* The dots/bullets/indicators */
			.slideshow-container .dot {
			  cursor: pointer;
			  height: 15px;
			  width: 15px;
			  margin: 0 2px;
			  background-color: #bbb;
			  border-radius: 50%;
			  display: inline-block;
			  transition: background-color 0.6s ease;
			}

			.slideshow-container .active, .slideshow-container .dot:hover {
			  background-color: #717171;
			}

		</style>

		<section id="reconhecimento">
			<div id="fh5co-feature-product">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Quem sou eu...</h3>
							<p>Quem é a Jéssica?</p>
						</div>
					</div>

					<div class="row row-bottom-padded-md">
						<div class="col-md-6 col-md-offset-3 text-center animate-box">
							<img src="<?= get_template_directory_uri().'/images/jessica.jpg'; ?>" alt="Jéssica Bianca" style="width: 200px; margin-bottom: 30px; border-radius: 100px;">
						</div>
						<div class="col-md-12 text-center">
							<p class="animate-box">Sou apaixonada pela psiquê humana, amo o desafio de desenvolver, engajar e empoderar talentos. Encontrei o meu propósito de vida ao incentivar pessoas e humanizar processos de RH.</p>

							<strong class="animate-box">Estou na área de Gestão de Pessoas há mais de sete anos e com isso:</strong>
							<p class="text-left animate-box">
									<br>✔️ Iniciei como estagiária
									<br>✔️ Cresci como assistente
									<br>✔️ Atuei como analista
									<br>✔️ Atualmente me desenvolvo como Consultora.
							</p>

							<p class="animate-box">Minha metodologia une padrões de excelência e qualidade que aprendi em multinacionais, possibilitando a inclusão em todas as empresas.</p>

							<strong class="animate-box">Desenvolvo projetos focados em:</strong>
							<p class="text-left animate-box">
								<br>✔️ Atração e Seleção
								<br>✔️ Treinamento e Desenvolvimento
								<br>✔️ Endomarketing e Administração de Pessoas, seja em empresas nacionais e multinacionais.
							</p> 
						</div>
					</div>

					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<p>Reconhecimento no Linkedin</p>
						</div>
					</div>

					<div class="row row-bottom-padded-md">
						<div class="col-md-12 text-center animate-box">
							<div class="slideshow-container">

								<?php 
									for ($i = 0; $i < 32; $i++): 
										$path = get_template_directory_uri().'/images/reconhecimento/';
								?>
								  	<div class="mySlides">
									    <div class="numbertext"><?= $i+1; ?> / 32</div>
									    <img src="<?= $path.'img-('.($i+1).').jpeg'; ?>" style="width:100%">
								  	</div>
								<?php endfor; ?>

								<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
								<a class="next" onclick="plusSlides(1)">&#10095;</a>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 text-center animate-box">
							<a href="https://www.linkedin.com/in/jessicabiancarh/" class="btn btn-primary btn-lg">Ver Linkedin</a>
						</div>
					</div>
					
				</div>
			</div>
		</section>

		<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			// Next/previous controls
			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			// Thumbnail image controls
			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1} 
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
			      slides[i].style.display = "none"; 
			  }
			  for (i = 0; i < dots.length; i++) {
			      dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block"; 
			  dots[slideIndex-1].className += " active";
			}
		</script>

		<section id="voce">
			<div id="fh5co-portfolio" class="fh5co-section-gray">
				<div class="container">

					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Para você</h3>
							<p>Veja os serviços que preparamos especialmente para você.</p>
						</div>
					</div>

					<div class="row col-md-12 category-grid animate-box">
			            <?php 

					        $args = array(
					          'post_type'        => 'pessoa',
					          'orderby'          => 'date',
					          'order'            => 'DESC',
					          'posts_per_page'   => -1
					        );

					        $loop = new WP_Query( $args );
					        if( $loop->have_posts()): 
					        	while( $loop->have_posts() ):
						            $loop->the_post();
						            $meta = get_post_meta( $post->ID );
					    ?>

				            <a href="#<?= $post->post_name; ?>">
				              <i class="<?= $meta['pessoa_icone_id'][0]; ?>"></i>
				              <h6><?= get_the_title(); ?></h6>
				              <p><?= get_the_excerpt(); ?></p>
				            </a>

			            <?php
			                endwhile;
			              endif;
			            ?>
			        </div>

			        <div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<p>Mais sobre o que oferecemos.</p>
						</div>
					</div>

					<?php 

				        $args = array(
				          'post_type'        => 'pessoa',
				          'orderby'          => 'date',
				          'order'            => 'DESC',
				          'posts_per_page'   => -1
				        );

				        $counter = 0;
						$section = 0;
						$pre_div = '';
						$pos_div = '';

				        $loop = new WP_Query( $args );
				        if( $loop->have_posts()): 
				        	while( $loop->have_posts() ):
					            $loop->the_post();
					            $meta = get_post_meta( $post->ID );

						        if ($counter == 0){
						        	$pre_div = '<div class="row col-md-12 animate-box" style="margin-bottom: 10px;"><ul class="pricing">';
						        	$pos_div = '';
						        	$counter++;
						        } elseif ($counter == 2) {
						        	$pre_div = '';
						        	$pos_div = '</ul></div>';
						        	$counter = 0;
						        	$section++;
						        } else {
						        	$pre_div = '';
						        	$pos_div = '';
						        	$counter++;
						        }

						        echo $pre_div;

			   		?>
		            
			            <li id="<?= $post->post_name; ?>" class="col-md-4 col-sm-12">
			              <h6><?= get_the_title(); ?></h6>
			               <?php if ($meta['pessoa_valor_id'][0] != ""): ?>
				              <div class="price">
				                <sup>R$</sup><?= $meta['pessoa_valor_id'][0]; ?>
				              </div>
				    	  <?php endif; ?>
			              <hr>
			              <?= the_content(); ?>
			              <br>
			              <a class="btn btn-primary btn-block" href="<?= home_url( '/contato' ); ?>">Contato</a>
			            </li>

		            <?php

		            		echo $pos_div;

		                endwhile;
		              endif;
		            ?>

				</div>
			</div>
		</section>
		
		<section id="empresa">
			<div id="fh5co-portfolio" class="fh5co-section">
				<div class="container">

					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Para empresa</h3>
							<p>Veja os serviços que separamos para fazer sua empresa decolar ainda mais.</p>
						</div>
					</div>

					<div class="category-grid row col-md-12 animate-box">
			            
						<?php 

					        $args = array(
					          'post_type'        => 'empresa',
					          'orderby'          => 'date',
					          'order'            => 'DESC',
					          'posts_per_page'   => -1
					        );

					        $loop = new WP_Query( $args );
					        if( $loop->have_posts()): 
					        	while( $loop->have_posts() ):
						            $loop->the_post();
						            $meta = get_post_meta( $post->ID );
					    ?>

				            <a href="#<?= $post->post_name; ?>">
				              <i class="<?= $meta['empresa_icone_id'][0]; ?>"></i>
				              <h6><?= get_the_title(); ?></h6>
				              <p><?= get_the_excerpt(); ?></p>
				            </a>

			            <?php
			                endwhile;
			              endif;
			            ?>

			        </div>

			        <div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<p>Mais sobre o que oferecemos.</p>
						</div>
					</div>

					<?php 

				        $args = array(
				          'post_type'        => 'empresa',
				          'orderby'          => 'date',
				          'order'            => 'DESC',
				          'posts_per_page'   => -1
				        );

				        $counter = 0;
						$section = 0;
						$pre_div = '';
						$pos_div = '';

				        $loop = new WP_Query( $args );
				        if( $loop->have_posts()): 
				        	while( $loop->have_posts() ):
					            $loop->the_post();
					            $meta = get_post_meta( $post->ID );

						        if ($counter == 0){
						        	$pre_div = '<div class="row col-md-12 animate-box" style="margin-bottom: 10px;"><ul class="pricing">';
						        	$pos_div = '';
						        	$counter++;
						        } elseif ($counter == 2) {
						        	$pre_div = '';
						        	$pos_div = '</ul></div>';
						        	$counter = 0;
						        	$section++;
						        } else {
						        	$pre_div = '';
						        	$pos_div = '';
						        	$counter++;
						        }

						        echo $pre_div;

			   		?>
		            
			            <li id="<?= $post->post_name; ?>" class="col-md-4 col-sm-12">
			              <h6><?= get_the_title(); ?></h6>
			              <?php if ($meta['empresa_valor_id'][0] != ""): ?>
				              <div class="price">
				                <sup>R$</sup><?= $meta['empresa_valor_id'][0]; ?>
				              </div>
				    	  <?php endif; ?>
			              <hr>
			              <?= the_content(); ?>
			              <br>
			              <a class="btn btn-primary btn-block" href="<?= home_url( '/contato' ); ?>">Contato</a>
			            </li>

		            <?php

		            		echo $pos_div;

		                endwhile;
		              endif;
		            ?>

				</div>
			</div>
		</section>

		<?php $count_posted = wp_count_posts('live')->publish; if ($count_posted > 0): ?>
		<section id="videos">
			<div id="fh5co-portfolio" class="fh5co-section-gray">
				<div class="container">

					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Nossos Vídeos</h3>
							<p>Semanalmente, novos conteúdos e temas interessantes são abordados em nossos vídeos, confira agora mesmo.</p>
						</div>
					</div>

					<div class="row row-bottom-padded-md">
						<div class="col-md-12">
							<ul id="fh5co-portfolio-list">

								<?php 

						          	$metadata_args = array(
							            array(         
							              'key'     => 'estado_live_id', 
							              'value'   => 'Online', 
							              'compare' => 'LIKE',
							              'type'    => 'STRING'  
							            )
						          	);

							        $args = array(
							          'post_type'        => 'live',
							          'meta_query'       => $metadata_args,
							          'orderby'          => 'date',
							          'order'            => 'DESC',
							          'posts_per_page'   => 1
							        );

							        $loop = new WP_Query( $args );
							        if( $loop->have_posts()): 
							    ?>
		  								<div class="col-md-12 text-center animate-box">
											<h3>Estamos ao vivo agora!</h3>
										</div>
								<?php
						          while( $loop->have_posts() ):
						            $loop->the_post();
						      	?>

									<li class="col-md-12 animate-box" data-animate-effect="fadeIn" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>); width: 100%; background-repeat: no-repeat; background-attachment: fixed; background-position: center; -webkit-filter: brightness(0.50);filter: brightness(0.50); ">
										<a href="<?= the_permalink(); ?>" class="color-3">
											<div class="case-studies-summary">
												<h2 style="color: #37a000"><i class="icon-video"></i> Ao vivo</h2>
												<span><?php the_title(); ?></span>
											</div>
										</a>
									</li>

								<?php
					                endwhile;
					              endif;

						          	$metadata_args = array(
							            array(         
							              'key'     => 'estado_live_id', 
							              'value'   => 'Offline', 
							              'compare' => 'LIKE',
							              'type'    => 'STRING'  
							            )
						          	);

							        $args = array(
							          'post_type'        => 'live',
							          'meta_query'       => $metadata_args,
							          'orderby'          => 'date',
							          'order'            => 'DESC',
							          'posts_per_page'   => 3
							        );

							        $loop = new WP_Query( $args );
							        if( $loop->have_posts()):

							    ?>

							  	<div class="col-md-12 text-center animate-box">
									<br>
									<h3>Nossos outros Vídeos</h3>
								</div>

							    <?php
							         	while( $loop->have_posts() ):
							            	$loop->the_post(); 
							            	$lives_meta_data = get_post_meta( $post->ID );
							    ?>

								<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-attachment: fixed; background-position: center; -webkit-filter: brightness(0.50);filter: brightness(0.50); ">
										<a href="<?= the_permalink(); ?>" class="color-3">
											<div class="case-studies-summary">
												<h2>
									<?= $lives_meta_data['d_dia_id'][0]; ?> de
									<?php
										switch ($lives_meta_data['d_mes_id'][0]) {
									        case "0	":   $mes = 'Janeiro';     break;
									        case "1":    $mes = 'Fevereiro';   break;
									        case "2":    $mes = 'Março';       break;
									        case "3":    $mes = 'Abril';       break;
									        case "4":    $mes = 'Maio';        break;
									        case "5":    $mes = 'Junho';       break;
									        case "6":    $mes = 'Julho';       break;
									        case "7":    $mes = 'Agosto';      break;
									        case "8":    $mes = 'Setembro';    break;
									        case "9":    $mes = 'Outubro';     break;
									        case "10":   $mes = 'Novembro';    break;
									        case "11":   $mes = 'Dezembro';    break; 
								 		}
								 		echo $mes;
								 	?> de <?= $lives_meta_data['d_ano_id'][0]; ?></h2>
												<span><?php the_title(); ?></span>
											</div>
										</a>
									</li>

								<?php
					                	endwhile;
					                	$libera_live = 1;
					              	else:
					              		$infolive = '<h2 class="text-center animate-box">Infelizmente nenhum outro vídeo foi gravado ainda...</h2>';
					              	endif;
					            ?>
								
							</ul>
							<?php echo $infolive; ?>		
						</div>
					</div>

					<?php if ($libera_live == 1): ?>
					<div class="row">
						<div class="col-md-4 col-md-offset-4 text-center animate-box">
							<a href="lives" class="btn btn-primary btn-lg">Ver mais Vídeos</a>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
        
        <section id="agenda">
			<div id="fh5co-blog-section">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Nossa Programação</h3>
							<p>Fique por dentro de nossa agenda de lives agora mesmo! Aproveite e se inscreva também em nossa lista.</p>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row row-padded-mb">


						<?php 

					        $args = array(
					          'post_type'        => 'live',
					          'orderby'     	 => 'date',
					          'order'            => 'DESC',
					          'posts_per_page'   => 3
					        );

					        $loop = new WP_Query( $args );
					        if( $loop->have_posts()):
					        	$i = 0;
					         	while( $loop->have_posts() ):
					            	$loop->the_post(); 
					            	$lives_meta_data = get_post_meta( $post->ID );
					            	$i++;
					    ?>

					    <div class="col-md-4 animate-box">
							<div class="fh5co-event">
								<div class="date text-center"><span><?= $lives_meta_data['d_dia_id'][0]; ?><br>
									<?php
										switch ($lives_meta_data['d_mes_id'][0]) {
									        case "0	":   $mes = 'Janeiro';     break;
									        case "1":    $mes = 'Fevereiro';   break;
									        case "2":    $mes = 'Março';       break;
									        case "3":    $mes = 'Abril';       break;
									        case "4":    $mes = 'Maio';        break;
									        case "5":    $mes = 'Junho';       break;
									        case "6":    $mes = 'Julho';       break;
									        case "7":    $mes = 'Agosto';      break;
									        case "8":    $mes = 'Setembro';    break;
									        case "9":    $mes = 'Outubro';     break;
									        case "10":   $mes = 'Novembro';    break;
									        case "11":   $mes = 'Dezembro';    break; 
								 		}
								 		echo $mes;
								 	?>
									</span></div>
								<h3 id="titlelive<?= $i; ?>"><b id="iconlive<?= $i; ?>"><i class="fa fa-calendar"></i></b> <a href="<?= the_permalink(); ?>">Live: <?php the_title(); ?></a></h3>
								<p id="timelive<?= $i; ?>"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $lives_meta_data['horalive_id'][0]; ?>:<?= $lives_meta_data['minlive_id'][0]; ?></p>
								<p id="contentlive<?= $i; ?>"><?php 
									$content = get_the_title(); 
							        echo mb_strimwidth($content, 0, 50, '...'); 
							    ?></p>
								<p><a href="#notifique-me">Inscreva-se</a></p>
							</div>
							<script>
								var countDownDate = new Date(<?= $lives_meta_data['d_ano_id'][0]; ?>,<?= $lives_meta_data['d_mes_id'][0]; ?>,<?= $lives_meta_data['d_dia_id'][0]; ?>,<?= $lives_meta_data['horalive_id'][0]; ?>,<?= $lives_meta_data['minlive_id'][0]; ?>,0,0);

								var checknow = new Date().getTime();
								var ds = countDownDate - checknow;
								if (ds < 0){
									document.getElementById('iconlive<?= $i; ?>').innerHTML = '<i color="#37a000" class="fa fa-check"></i>';;
									document.getElementById('timelive<?= $i; ?>').style.color = '#37a000';
									document.getElementById('contentlive<?= $i; ?>').style.color = '#37a000';
								}
							</script>
						</div>

						<?php
			                	endwhile;
			                	$libera_programacao = 1;
			              	else:
			              		echo '<h2 class="col-md-12 text-center animate-box">Infelizmente nenhuma live programada foi encontrada no momento...</h2>';
			              	endif;
			            ?>					


					</div>

					<?php if ($libera_programacao == 1): ?>
					<div class="row">
						<div class="col-md-4 col-md-offset-4 text-center animate-box">
							<a href="programacao" class="btn btn-primary btn-lg">Ver a Programação</a>
						</div>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</section>
		<?php endif; ?>
		
		<?php $count_posted = wp_count_posts('post')->publish; if ($count_posted > 0): ?>
		<section id="blog">
			<div id="fh5co-blog-section" class="fh5co-section-gray">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Nossas Postagens</h3>
							<p>Confira nossas postagens sobre variados temas contemporâneos e de grande importancia.</p>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row row-bottom-padded-md">
						
						<?php 

					        $args = array(
					          'post_type'        => 'post',
					          'orderby'          => 'date',
					          'order'            => 'DESC',
					          'posts_per_page'   => 3
					        );

					        $loop = new WP_Query( $args );
					        if( $loop->have_posts()): 
					        	while( $loop->have_posts() ):
						            $loop->the_post();
					    ?>
						<div class="clearfix visible-sm-block"></div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="fh5co-blog animate-box">
								<a href="<?= the_permalink(); ?>"><img class="img-responsive" src="<?= get_the_post_thumbnail_url(); ?>" alt=""></a>
								<div class="blog-text">
									<div class="prod-title">
										<h3><a href="<?= the_permalink(); ?>">
											<?php 
												$content = get_the_title(); 
							                    echo mb_strimwidth($content, 0, 50, '...');
											?></a></h3>
										<span class="posted_by"><?php echo get_the_date(); ?></span>
										<span class="comment"><a href="<?= the_permalink(); ?>"><span class="fb-comments-count" data-href="<?= the_permalink(); ?>"></span><i class="icon-bubble2"></i></a></span>
										<p>
											<?php 
							                    $content = get_the_content(); 
							                    echo strip_tags(apply_filters('the_content',  mb_strimwidth($content, 0, 150, '...'))); 
							                ?>
						                </p>
										<p><a href="<?= the_permalink(); ?>">Leia mais...</a></p>
									</div>
								</div> 
							</div>
						</div>	
						<?php
			                endwhile;
			              endif;
			            ?>

					</div>

					<div class="row">
						<div class="col-md-4 col-md-offset-4 text-center animate-box">
							<a href="postagens" class="btn btn-primary btn-lg">Ver as Postagens</a>
						</div>
					</div>

				</div>
			</div>
		</section>
		<?php endif; ?>

<?php get_footer(); ?>