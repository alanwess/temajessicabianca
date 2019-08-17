<?php get_header(); //Template Name: Parceiros ?>

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
							<?php $count_posted = wp_count_posts('parceiro')->publish; if ($count_posted > 0): ?><li class="active"><a href="<?= home_url( '/parceiros' ); ?>">Parceiros</a></li><?php endif; ?>
							<li><a href="<?= home_url( '/contato' ); ?>">Contato</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<section id="parceiros">
			<div id="fh5co-testimonial">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Conheça os nossos parceiros</h3>
						</div>
					</div>
				</div>
				<div class="row">
						<div class="col-md-12">
							<div class="row animate-box">
								<div class="owl-carousel owl-carousel-fullwidth">
									<?php 

								        $args = array(
								          'post_type'        => 'parceiro',
								          'orderby'          => 'date',
								          'order'            => 'DESC',
								          'posts_per_page'   => -1
								        );

								        $loop = new WP_Query( $args );
								        if( $loop->have_posts()): 
								          while( $loop->have_posts() ):
								            $loop->the_post();
								            $parceiros_meta_data = get_post_meta( $post->ID );
							      	?>

									<div class="col-md-3 animate-box" style="padding-bottom: 30px;">
										<div class="testimony-slide active text-center">
											<div class="user" style="background-image: url(<?= $parceiros_meta_data['logoparceiro_id'][0]; ?>);"></div>
											<span style="color: #000000;"><a href="<?= $parceiros_meta_data['linkparceiro_id'][0]; ?>"><?= $parceiros_meta_data['nomeparceiro_id'][0]; ?></a></span>
										</div>
									</div>
									
									<?php
				                    		endwhile;
				                   		endif;
				                	?>  

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php get_footer(); ?>

