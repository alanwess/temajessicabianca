<?php get_header(); //Template Name: Busca 
	if (isset($_GET['busca'])) $busca = $_GET['busca']; 
?>

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
							<?php $count_posted = wp_count_posts('live')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/lives' ); ?>">Vídeos</a></li><?php endif; ?>
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
						<div class="row row-bottom-padded-md col-md-12" style="margin-left: 5px; margin-right: 5px;">
                        <form class="navbar-form" role="search">
                        	<div class="input-group input-group-lg add-on col-lg-12">
								<input type="text" class="form-control" id="name" name="busca" placeholder="Buscar..." value="<?php echo $busca; ?>" width="100%">
								<div class="input-group-btn">
									<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
								</div>
							</div>
                        </form>
                    	</div>
						<div class="col-md-12 heading-section animate-box">
								<?php 

									//Soma lives on
									$metadata_args1 = array(
							            array(         
							              'key'     => 'estado_live_id', 
							              'value'   => 'Online', 
							              'compare' => 'LIKE',
							              'type'    => 'STRING'  
							            )
						          	);

							        $args1 = array(
							          'post_type'        => 'live',
							          's'       		 => $busca,
							          'meta_query'       => $metadata_args1,
							          'orderby'          => 'date',
							          'order'            => 'DESC'
							        );

							        $loop1 = new WP_Query( $args1 );

							        $metadata_args2 = array(
							            array(         
							              'key'     => 'estado_live_id', 
							              'value'   => 'Offline', 
							              'compare' => 'LIKE',
							              'type'    => 'STRING'
							            )
						          	);

							     	$args2 = array(
							          'post_type'        => 'live',
							          's'       		 => $busca,
							          'meta_query'       => $metadata_args2,
							          'orderby'          => 'date',
							          'order'            => 'DESC'
							        );

							        $loop2 = new WP_Query( $args2 );
							        $soma1 = intval($loop1->post_count) + intval($loop2->post_count);
							        if($soma1 > 0) $contagem_live = "Foram encontrados ".$soma1." resultado(s) para vídeos...";
							        //Soma lives off

							        //Soma blog on
							        $args3 = array(
							          'post_type'        => 'post',
							          'orderby'          => 'date',
							          'order'            => 'DESC',
							          's'       		 => $busca
							        );
							        $loop3 = new WP_Query( $args3 );
							        $soma2 = intval($loop3->post_count);
							        if($soma2 > 0) $contagem_blog = "Foram encontrados ".$soma2." resultado(s) para as postagens...";
							        //Soma blog off

							        $somatotal = $soma1 + $soma2;
							        if($somatotal > 0) echo '<h3>Encontramos '.$somatotal.' resultado(s)...</h3>';
							        else echo '<h3>Não foi possivel encontrar nenhum resultado para sua busca</h3>';
							?>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row row-bottom-padded-md">
						<div class="col-md-12">
							<h2 class="animate-box"><?= $contagem_live; ?></h2>
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
							          's'       		 => $busca,
							          'meta_query'       => $metadata_args,
							          'orderby'          => 'date',
							          'posts_per_page'   => 3,
							          'order'            => 'DESC'
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
							          's'       		 => $busca,
							          'meta_query'       => $metadata_args,
							          'orderby'          => 'date',
							          'posts_per_page'   => 3,
							          'order'            => 'DESC'
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
					                	$dialog = '<div class="col-md-12 text-center animate-box" style="margin-top: 20px"><a href="busca-de-lives?busca='.$busca.'" class="btn btn-primary">Ver mais</a></div>';
					              	else:
					              		echo '<h2 class="animate-box">Infelizmente nenhum vídeo foi gravado até o momento...</h2>';
					              	endif;
					            ?>
					        </ul>
					        <?= $dialog; ?>
						</div>
					</div>
					<div class="row row-bottom-padded-md">
						<h2 class="col-md-12 animate-box"><?= $contagem_blog; ?></h2>
						<?php 

					        $args = array(
					          'post_type'        => 'post',
					          'orderby'          => 'date',
					          'order'            => 'DESC',
					          's'       		 => $busca,
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
			             	echo '<div class="col-md-12 text-center animate-box"><a href="busca-de-postagens?busca='.$busca.'" class="btn btn-primary">Ver mais</a></div>';
		              	else:
		              		echo '<h2 class="col-md-12 animate-box">Infelizmente nenhum post foi encontrado no momento...</h2>';
		              	endif;
			            ?>	
				</div>
			</div>
		</section>

<?php get_footer(); ?>
