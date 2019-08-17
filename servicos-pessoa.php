<?php get_header(); // Template Name: Para Você ?>  

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
							<li class="active"><a href="<?= home_url( '/pessoa' ); ?>">Para você</a></li>
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
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Veja os serviços que preparamos especialmente para você.</h3>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row col-md-12 category-grid">
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
						        	$pre_div = '<div class="row col-md-12" style="margin-bottom: 10px;"><ul class="pricing">';
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

<?php get_footer(); ?>