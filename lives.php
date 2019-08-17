<?php get_header(); //Template Name: Lives ?> 

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

		<section id="novas">
			<div id="fh5co-blog-section" class="fh5co-section-gray">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Veja nossos vídeos recentes</h3>
						</div>
					</div>
				</div>
				<div class="container">
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
							          'posts_per_page'   => -1
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
							          'posts_per_page'   => -1
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
												<h2><?= $lives_meta_data['d_dia_id'][0]; ?> de
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
								 	?> de <?= $lives_meta_data['d_ano_id'][0]; ?></h2>
												<span><?php the_title(); ?></span>
											</div>
										</a>
									</li>

								<?php
					                	endwhile;
					              	else:
					              		$infolive = '<h2 class="text-center animate-box">Infelizmente nenhum vídeo foi gravado até o momento...</h2>';
					              	endif;
					            ?>

							</ul>
						    <?php echo $infolive; ?>		
						</div>
					</div>
				</div>
			</div>
		</section>

<?php get_footer(); ?>