<?php get_header(); //Template Name: Busca de Postagens 
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
							<?php $count_posted = wp_count_posts('post')->publish; if ($count_posted > 0): ?><li class="active"><a href="<?= home_url( '/postagens' ); ?>">Blog</a></li><?php endif; ?>
							<?php $count_posted = wp_count_posts('parceiro')->publish; if ($count_posted > 0): ?><li><a href="<?= home_url( '/parceiros' ); ?>">Parceiros</a></li><?php endif; ?>
							<li><a href="<?= home_url( '/contato' ); ?>">Contato</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<section id="blog">
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
							?>
							<h3><?= $contagem_blog; ?></h3>
							<a href="<?= home_url( '/busca?busca='.$busca ); ?>">Pesquisar em todas as seções</a>
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
					          's'       		 => $busca,
					          'posts_per_page'   => -1
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
		              	else:
		              		echo '<h2 class="col-md-12 animate-box">Infelizmente nenhum post foi encontrado no momento...</h2>';
		              	endif;
			            ?>	
					</div>	
				</div>
			</div>
		</section>

<?php get_footer(); ?>
